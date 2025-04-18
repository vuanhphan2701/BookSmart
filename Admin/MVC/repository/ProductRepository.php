<?php
class productRepository extends Repository
{
    private $db = null;
    private $productModel = null;
    function __construct()
    {
        $this->db = new Repository();
        $this->productModel = new Product();
    }
    function list(): array
    {
        $products = [];
        $lists =  $this->db->setquery('select*from products where status = 1 ORDER BY created_at DESC;')->loadrows();
        foreach ($lists as $value) {
            $this->mapDataToModel($value, [
                'id',
                'productName',
                'price',
                'description',
                'image'
            ]);

            $products[] = clone  $this->productModel;
            $this->productModel->reset();
        }
        return $products;
    }
    function history(): array
    {
        $products = [];
        $lists =  $this->db->setquery('select*from products where status = 0')->loadrows();
        foreach ($lists as $value) {
            $this->mapDataToModel($value, [
                'id',
                'productName',
                'price',
                'description',
                'image'
            ]);

            $products[] = clone  $this->productModel;
            $this->productModel->reset();
        }
        return $products;
    }
    function deletePermanently($id)
    {
        return $this->db->setquery('Delete from products where product_id=?')
            ->save([$id]);
    }
    function getproductById($id): array
    {
        $products = [];
        $value = $this->db
            ->setquery('Select*from products where product_id =?')
            ->loadrow([$id]);

        $this->mapDataToModel(
            $value,
            [
                'id',
                'productName',
                'price',
                'description',
                'image',
                'updated_at',
                'created_at'
            ]
        );
        $products[] = clone  $this->productModel;
        $this->productModel->reset();
        return $products;
    }
    function update($id, $product_name, $image, $description, $price, $updated_at)
    {
        return $this->db
            ->setquery('update products set 
            product_name=?, price=?,image=?, description=?,updated_at=? where product_id =?')
            ->save([$product_name, $price, $image, $description, $updated_at, $id]);
    }
    function delete($id)
    {
        return $this->db->setquery('update products set status= 0 where product_id=?')
            ->save([$id]);
    }
    function restore($id)
    {
        return $this->db->setquery('update products set status= 1 where product_id=?')
            ->save([$id]);
    }
    function add($product_name, $image, $description, $price)
    {
        // /dd($_POST);
        return $this->db
        ->setquery('INSERT INTO products(
                          `product_name`,                          
                          `price`,
                          `image`,
                          `description`,
                          `created_at`, 
                          `updated_at`) 
                          VALUES (?, ?, ?, ?, NOW(), NULL)')
        ->save([$product_name, $price, $image, $description]);
    
    }
    function search($product_name)
    {
        $products = [];
        $searchTerm = "%" . $product_name . "%";
        $values = $this->db
            ->setquery('select * from products where product_name like ? and status !=0')
            ->loadrows([$searchTerm]);
        foreach ($values as $value) {
            $this->mapDataToModel(
                $value,
                [
                    'id',
                    'productName',
                    'price',
                    'description',
                    'image',
                    'updated_at',
                    'created_at'
                ]
            );
            $products[] = clone  $this->productModel;
            $this->productModel->reset();
        }
       // dd($products);
        return $products;
    }

    //----------------------------------------------- MAP DATA TO MODEL  -----------------------------------------------------------
    function mapDataToModel($value, $fields = [])
    {
        if (empty($fields) || in_array('id', $fields)) {
            $this->productModel->setId($value->product_id);
        }
        if (empty($fields) || in_array('productName', $fields)) {
            $this->productModel->setProductname($value->product_name);
        }
        if (empty($fields) || in_array('price', $fields)) {
            $this->productModel->setPrice($value->price);
        }
        if (empty($fields) || in_array('description', $fields)) {
            $this->productModel->setDescription($value->description);
        }
        if (empty($fields) || in_array('image', $fields)) {
            $this->productModel->setImage($value->image);
        }
        if (empty($fields) || in_array('updated_at', $fields)) {
            $this->productModel->setUpdated_at($value->updated_at);
        }
        if (empty($fields) || in_array('created_at', $fields)) {
            $this->productModel->setCreated_at($value->created_at);
        }
    }
}
