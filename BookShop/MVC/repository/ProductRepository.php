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
        $lists =  $this->db->setquery('select*from products where status= 1')->loadrows();
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
    function listType($type): array
    {
        $products = [];
        $lists =  $this->db->setquery('select*from products where status= 1 and book_type= ?')->loadrows([$type]);
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
    function delete($id)
    {
        return $this->db->setquery('Delete from products where product_id =?')
            ->save([$id]);
    }

    function getproductById($id): array
    {
        $products = [];
        $lists =  $this->db->setquery('select*from products where status= 1 and product_id= ?')->loadrow([$id]);
        $this->mapDataToModel($lists, [
            'id',
            'productName',
            'price',
            'description',
            'image'
        ]);

        $products[] = clone  $this->productModel;
        $this->productModel->reset();
        return $products;
    }
    function detail($id)
    {
        $products = [];
        $detail = $this->db->setquery('select*from products where status= 1 and product_id = ?')->loadrow([$id]);
        //dd($detail);
        $this->mapDataToModel(
            $detail,
            [
                'id',
                'productName',
                'price',
                'description',
                'image',
                'book_type',
                'author',
                'ISBN',
                'book_format',
                'publisher',
            ]
        );
        $products[] = clone $this->productModel;
        $this->productModel->reset();
        // dd($products); 
        return $products;
    }
    function category($type)
    {
        $products = [];
        $lists = $this->db->setquery('SELECT * FROM products WHERE status= 1 and category_id 
        IN (SELECT category_id FROM category WHERE category_name = ?)')
            ->loadrows([$type]);
        foreach ($lists as $item) {
            $this->mapDataToModel(
                $item,
                [
                    'id',
                    'productName',
                    'price',
                    'description',
                    'image',
                    'category_id'
                ]
            );
            $products[] = clone $this->productModel;
            $this->productModel->reset();
        }
        return $products;
    }
    function search($product_name)
    {
        $products = [];
        $searchTerm = "%" . $product_name . "%";
        $values = $this->db
            ->setquery('select * from products where status= 1 and  product_name like ? ')
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

    function searchGender($gender)
    {
        $products = [];
       // $searchTerm = "%" . $gender . "%";
        $values = $this->db
            ->setquery('SELECT * FROM products WHERE status= 1 and category_id 
        IN (SELECT category_id FROM category WHERE category_name = ?)')
            ->loadrows([$gender]);
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
        if (empty($fields) || in_array('category_id', $fields)) {
            $this->productModel->setCategoryId($value->category_id);
        }
        if (empty($fields) || in_array('book_type', $fields)) {
            $this->productModel->setBookType($value->book_type);
        }
        if (empty($fields) || in_array('author', $fields)) {
            $this->productModel->setAuthor($value->Author);
        }
        if (empty($fields) || in_array('ISBN', $fields)) {
            $this->productModel->setISBN($value->ISBN);
        }
        if (empty($fields) || in_array('book_format', $fields)) {
            $this->productModel->setBookFormat($value->Book_Format);
        }
        if (empty($fields) || in_array('publisher', $fields)) {
            $this->productModel->setPublisher($value->Publisher);
        }
    }
}
