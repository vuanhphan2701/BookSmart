<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Role Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #5e72e4;
            --success-color: #2dce89;
            --info-color: #11cdef;
            --warning-color: #fb6340;
            --danger-color: #f5365c;
            --secondary-color: #172b4d;
            --light-color: #f8f9fa;
            --dark-color: #172b4d;
            --border-color: #e9ecef;
            --text-color: #525f7f;
            --text-muted: #8898aa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: var(--text-color);
            padding: 0;
            margin: 0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .card {
            background-color: #fff;
            border-radius: 0.375rem;
            box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
            margin-bottom: 1.5rem;
            border: 0;
        }
        
        .card-header {
            padding: 1.25rem 1.5rem;
            margin-bottom: 0;
            background-color: #fff;
            border-bottom: 1px solid var(--border-color);
            border-top-left-radius: 0.375rem;
            border-top-right-radius: 0.375rem;
        }
        
        .card-title {
            margin-bottom: 0;
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--secondary-color);
        }
        
        .card-body {
            flex: 1 1 auto;
            padding: 1.5rem;
        }
        
        .alert {
            position: relative;
            padding: 1rem 1.5rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.375rem;
        }
        
        .alert-success {
            color: #1aae6f;
            background-color: #d7f1e6;
            border-color: #c7edd8;
        }
        
        .tree {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        .tree li {
            margin: 0;
            padding: 0 15px;
            line-height: 30px;
            position: relative;
        }
        
        .tree li::before,
        .tree li::after {
            content: '';
            position: absolute;
            left: 0;
        }
        
        .tree li::before {
            border-left: 2px solid #e9ecef;
            bottom: 50px;
            height: 100%;
            top: 0;
            width: 1px;
        }
        
        .tree li::after {
            border-top: 2px solid #e9ecef;
            height: 20px;
            top: 15px;
            width: 15px;
        }
        
        .tree li:last-child::before {
            height: 15px;
        }
        
        .tree-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        
        .tree-checkbox {
            margin-right: 8px;
            cursor: pointer;
            width: 18px;
            height: 18px;
        }
        
        .tree-checkbox:checked + .tree-button {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(94, 114, 228, 0.25);
        }
        
        .tree-button {
            border: 1px solid #e9ecef;
            padding: 6px 12px;
            background: #fff;
            color: var(--text-color);
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            min-width: 150px;
        }
        
        .tree-button:hover {
            background: #f6f9fc;
            border-color: #d2d9e2;
        }
        
        .tree-button-level-1 {
            background-color: #fff9c4;
            border-color: #ffd54f;
        }
        
        .tree-button-level-2 {
            background-color: #e8f5e9;
            border-color: #a5d6a7;
        }
        
        .tree-button-level-3 {
            background-color: #e3f2fd;
            border-color: #90caf9;
        }
        
        .tree-button-level-4 {
            background-color: #ffebee;
            border-color: #ef9a9a;
        }
        
        .tree ul {
            margin-left: 12px;
            padding-left: 18px;
            display: block;
        }
        
        .btn {
            display: inline-block;
            font-weight: 600;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.625rem 1.25rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            cursor: pointer;
            margin-right: 0.5rem;
        }
        
        .btn-primary {
            color: #fff;
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #485fe0;
            border-color: #3d55df;
        }
        
        .btn-dark {
            color: #fff;
            background-color: var(--dark-color);
            border-color: var(--dark-color);
        }
        
        .btn-dark:hover {
            background-color: #0f1c33;
            border-color: #0a1526;
        }
        
        .form-actions {
            margin-top: 2rem;
            display: flex;
            align-items: center;
        }
        
        .collapse-toggle {
            margin-left: auto;
            font-size: 0.875rem;
            color: var(--primary-color);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .collapse-toggle:hover {
            text-decoration: underline;
        }
        
        /* Custom checkbox styling */
        .custom-checkbox {
            position: relative;
            display: inline-block;
            width: 18px;
            height: 18px;
            margin-right: 8px;
        }
        
        .custom-checkbox input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            width: 18px;
            height: 18px;
            background-color: #fff;
            border: 1px solid #d1d9e6;
            border-radius: 3px;
            transition: all 0.2s ease;
        }
        
        .custom-checkbox input:checked ~ .checkmark {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }
        
        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }
        
        .custom-checkbox .checkmark:after {
            left: 6px;
            top: 2px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $alert = new RoleController();
        echo $alert->getError('alert');
        ?>
        
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <i class="fas fa-user-shield mr-2"></i> Set Role for User ID: <?php echo htmlspecialchars(urldecode($_GET['id'])) ?>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="text-muted">Select the permissions you want to assign to this user.</p>
                    <div class="collapse-toggle" onclick="toggleAllNodes()">
                        <i class="fas fa-expand-alt"></i> Expand/Collapse All
                    </div>
                </div>
                
                <form method="post" action="<?php echo href('role', 'save') ?>">
                    <ul class="tree">
                        <?php
                        foreach ($parentFunc as $pr) {
                            $childs = $rmodel->listFunctions($pr->id);
                        ?>
                            <li>
                                <div class="tree-item">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" 
                                            <?php echo $rmodel->checkRole($_GET['id'], $pr->id) ? 'checked' : 'checked' ?>
                                            name="func_id[]" id="checkbox-<?= $pr->id ?>" value="<?= $pr->id ?>"
                                            class="tree-checkbox" onchange="updateChildCheckboxes(this)">
                                        <span class="checkmark"></span>
                                    </label>
                                    <button class="tree-button tree-button-level-1" type="button" 
                                            onclick="toggleCheckbox('checkbox-<?= $pr->id ?>')">
                                        <i class="fas fa-folder mr-2"></i> <?= $pr->name ?>
                                    </button>
                                    <i class="fas fa-chevron-down ml-2" style="margin-left: 10px; cursor: pointer;" 
                                       onclick="toggleNode(this)"></i>
                                </div>
                                <ul>
                                    <?php foreach ($childs as $ch) {
                                        $childs2 = $rmodel->listFunctions($ch->id);
                                    ?>
                                        <li>
                                            <div class="tree-item">
                                                <label class="custom-checkbox">
                                                    <input type="checkbox" 
                                                        <?php echo $rmodel->checkRole($_GET['id'], $ch->id) ? 'checked' : '' ?>
                                                        name="func_id[]" id="checkbox-<?= $ch->id ?>" value="<?= $ch->id ?>"
                                                        class="tree-checkbox" onchange="updateChildCheckboxes(this)">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <button class="tree-button tree-button-level-2" type="button" 
                                                        onclick="toggleCheckbox('checkbox-<?= $ch->id ?>')">
                                                    <i class="fas fa-folder-open mr-2"></i> <?= $ch->name ?>
                                                </button>
                                                <?php if (count($childs2) > 0) { ?>
                                                    <i class="fas fa-chevron-down ml-2" style="margin-left: 10px; cursor: pointer;" 
                                                       onclick="toggleNode(this)"></i>
                                                <?php } ?>
                                            </div>
                                            <ul>
                                                <?php foreach ($childs2 as $ch2) {
                                                    $childs3 = $rmodel->listFunctions($ch2->id);
                                                ?>
                                                    <li>
                                                        <div class="tree-item">
                                                            <label class="custom-checkbox">
                                                                <input type="checkbox" 
                                                                    <?php echo $rmodel->checkRole($_GET['id'], $ch2->id) ? 'checked' : '' ?>
                                                                    name="func_id[]" id="checkbox-<?= $ch2->id ?>" value="<?= $ch2->id ?>"
                                                                    class="tree-checkbox" onchange="updateChildCheckboxes(this)">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            <button class="tree-button tree-button-level-3" type="button" 
                                                                    onclick="toggleCheckbox('checkbox-<?= $ch2->id ?>')">
                                                                <i class="fas fa-file-alt mr-2"></i> <?= $ch2->name ?>
                                                            </button>
                                                            <?php if (count($childs3) > 0) { ?>
                                                                <i class="fas fa-chevron-down ml-2" style="margin-left: 10px; cursor: pointer;" 
                                                                   onclick="toggleNode(this)"></i>
                                                            <?php } ?>
                                                        </div>
                                                        <ul>
                                                            <?php foreach ($childs3 as $ch3) { ?>
                                                                <li>
                                                                    <div class="tree-item">
                                                                        <label class="custom-checkbox">
                                                                            <input type="checkbox" 
                                                                                <?php echo $rmodel->checkRole($_GET['id'], $ch3->id) ? 'checked' : '' ?>
                                                                                name="func_id[]" id="checkbox-<?= $ch3->id ?>" value="<?= $ch3->id ?>"
                                                                                class="tree-checkbox">
                                                                            <span class="checkmark"></span>
                                                                        </label>
                                                                        <button class="tree-button tree-button-level-4" type="button" 
                                                                                onclick="toggleCheckbox('checkbox-<?= $ch3->id ?>')">
                                                                            <i class="fas fa-file mr-2"></i> <?= $ch3->name ?>
                                                                        </button>
                                                                    </div>
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
                    
                    <div class="form-actions">
                        <a class="btn btn-dark" href="<?php echo href('role', 'index') ?>" role="button">
                            <i class="fas fa-arrow-left mr-1"></i> Back
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-1"></i> Save Permissions
                        </button>
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Toggle checkbox state
        function toggleCheckbox(id) {
            const checkbox = document.getElementById(id);
            if (checkbox) {
                checkbox.checked = !checkbox.checked;
                updateChildCheckboxes(checkbox);
            }
        }
        
        // Toggle node expansion
        function toggleNode(element) {
            const parentLi = element.closest('li');
            const childUl = parentLi.querySelector('ul');
            
            if (childUl) {
                if (childUl.style.display === 'none') {
                    childUl.style.display = 'block';
                    element.classList.remove('fa-chevron-right');
                    element.classList.add('fa-chevron-down');
                } else {
                    childUl.style.display = 'none';
                    element.classList.remove('fa-chevron-down');
                    element.classList.add('fa-chevron-right');
                }
            }
        }
        
        // Toggle all nodes
        function toggleAllNodes() {
            const allUls = document.querySelectorAll('.tree ul');
            const allIcons = document.querySelectorAll('.tree .fa-chevron-down, .tree .fa-chevron-right');
            
            // Check if any are hidden
            let anyHidden = false;
            allUls.forEach(ul => {
                if (ul.style.display === 'none') {
                    anyHidden = true;
                }
            });
            
            // Toggle based on state
            allUls.forEach(ul => {
                ul.style.display = anyHidden ? 'block' : 'none';
            });
            
            allIcons.forEach(icon => {
                if (anyHidden) {
                    icon.classList.remove('fa-chevron-right');
                    icon.classList.add('fa-chevron-down');
                } else {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-right');
                }
            });
        }
        
        // Update child checkboxes when parent is checked/unchecked
        function updateChildCheckboxes(checkbox) {
            const parentLi = checkbox.closest('li');
            const childCheckboxes = parentLi.querySelectorAll('ul input[type="checkbox"]');
            
            childCheckboxes.forEach(childBox => {
                childBox.checked = checkbox.checked;
            });
            
            // Update parent checkboxes
            updateParentCheckboxes();
        }
        
        // Update parent checkboxes based on children
        function updateParentCheckboxes() {
            const allParentLis = document.querySelectorAll('.tree > li, .tree > li li');
            
            allParentLis.forEach(li => {
                const parentCheckbox = li.querySelector('> .tree-item input[type="checkbox"]');
                const childCheckboxes = li.querySelectorAll('ul input[type="checkbox"]');
                
                if (parentCheckbox && childCheckboxes.length > 0) {
                    let allChecked = true;
                    let allUnchecked = true;
                    
                    childCheckboxes.forEach(childBox => {
                        if (childBox.checked) {
                            allUnchecked = false;
                        } else {
                            allChecked = false;
                        }
                    });
                    
                    if (allChecked) {
                        parentCheckbox.checked = true;
                        parentCheckbox.indeterminate = false;
                    } else if (allUnchecked) {
                        parentCheckbox.checked = false;
                        parentCheckbox.indeterminate = false;
                    } else {
                        parentCheckbox.indeterminate = true;
                    }
                }
            });
        }
        
        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize parent checkboxes
            updateParentCheckboxes();
            
            // Add event listeners to all checkboxes
            const allCheckboxes = document.querySelectorAll('.tree-checkbox');
            allCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    updateChildCheckboxes(this);
                });
            });
        });
    </script>
</body>
</html>