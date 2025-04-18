<!DOCTYPE html>
<html lang="en">
<?php
$alert = new RoleController();
echo $alert->getError('alert');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Tree View with Checkboxes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 0px;
        }

        .tree {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .tree li {
            margin: 0;
            padding: 0 15px;
            line-height: 24px;
            position: relative;
        }

        .tree li::before,
        .tree li::after {
            content: '';
            position: absolute;
            left: 0;
        }

        .tree li::before {
            border-left: 1px solid #ccc;
            bottom: 50px;
            height: 100%;
            top: 0;
            width: 1px;
        }

        .tree li::after {
            border-top: 1px solid #ccc;
            height: 20px;
            top: 12px;
            width: 12px;
        }

        .tree li:last-child::before {
            height: 12px;
        }

        .tree li button {
            border: 1px solid #ccc;
            padding: 5px 10px;
            background: #f8f8f8;
            color: #333;
            border-radius: 4px;
            cursor: pointer;
        }

        .tree li button:hover {
            background: #e9e9e9;
        }

        .tree ul {
            margin-left: 12px;
            padding-left: 18px;
        }
    </style>

</head>

<body>
<h1>Set Role <?php echo 'User id = ' . htmlspecialchars(urldecode($_GET['id'])) ?></h1>
<form method="post" action="<?php echo href('role', 'save') ?>">
    <ul class="tree">

        <?php
        foreach ($parentFunc as $pr) {
            $childs = $rmodel->listFunctions($pr->id);
            ?>
            <li>
                <label>
                    <input type="checkbox"
                        <?php echo $rmodel->checkRole($_GET['id'], $pr->id) ? 'checked' : '' ?>
                           name="func_id[]" id="checkbox-<?= $pr->id ?>" value="<?= $pr->id ?>">
                </label>
                <button class="" type="button", style="background-color: #FFEB3B  "
                        onclick="toggleCheckbox('checkbox-<?= $pr->id ?>')"><?= $pr->name ?></button>
                <ul>
                    <?php foreach ($childs as $ch) {
                        $childs2 = $rmodel->listFunctions($ch->id);
                        ?>
                        <li>
                            <label>
                                <input type="checkbox" <?php echo $rmodel->checkRole($_GET['id'], $ch->id) ? 'checked' : '' ?>
                                       name="func_id[]" id="checkbox-<?= $ch->id ?>" value="<?= $ch->id ?>">
                            </label>
                            <button class="" type="button", style="background-color: #b6e284 "
                                    onclick="toggleCheckbox('checkbox-<?= $ch->id ?>')"><?= $ch->name ?></button>
                            <ul>
                                <?php foreach ($childs2 as $ch2) {
                                    $childs3 = $rmodel->listFunctions($ch2->id);
                                    ?>
                                    <li>
                                        <label>
                                            <input type="checkbox" <?php echo $rmodel->checkRole($_GET['id'], $ch2->id) ? 'checked' : '' ?>
                                                   name="func_id[]" id="checkbox-<?= $ch2->id ?>"
                                                   value="<?= $ch2->id ?>">
                                        </label>
                                        <button class="" type="button" style="background-color: #90bcde  "
                                                onclick="toggleCheckbox('checkbox-<?= $ch2->id ?>')"><?= $ch2->name ?></button>
                                        <ul>
                                            <?php foreach ($childs3 as $ch3) {
                                                ?>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" <?php echo $rmodel->checkRole($_GET['id'], $ch3->id) ? 'checked' : '' ?>
                                                               name="func_id[]" id="checkbox-<?= $ch3->id ?>"
                                                               value="<?= $ch3->id ?>">
                                                    </label>
                                                    <button class="" type="button" style=" background-color:#ecb9b5 "
                                                            onclick="toggleCheckbox('checkbox-<?= $ch3->id ?>')"><?= $ch3->name ?></button>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
    </ul>
    <br>
    <a
            name=""
            id=""
            class="btn btn-dark"
            href="<?php echo href('role', 'index') ?>"
            role="button">back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
</form>
<script>
    function toggleCheckbox(id) {
        const checkbox = document.getElementById(id);
        if (checkbox) {
            checkbox.checked = !checkbox.checked;
        }
    }
</script>
</body>

</html>