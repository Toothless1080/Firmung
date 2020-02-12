<?php

include '../menu.php';
include '../header.php';
include 'inc/' . basename(__FILE__, '.php') . '.inc.php'; //.inc File Import


?>
<div class="content">
    <div class="card">
        <div class="card-header">
            <label>Kat Themen</label>
            <form method="post">
                <input name="new_theme" type="text" placeholder="Neues Thema">
                <button>+</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Name<i class="fas fa-trash-alt"></i></th>
                        <th>Stimmen</th>
                        <th width="10%">Aktion</th>
                    </tr>
                </thead>
                <tbody>
            <? foreach ($rows as $item){ ?>
                <tr>
                    <td><?= $item['id']?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['count'] ?></td>
                    <td><?= '<a href="cat_theme_overview.php?vote=true&id=' . MyCrypt::encrypt($item['id']) . '">
                                        <i class="fas fa-thumbs-up"></i></a>' ?>
                        <?= '<a href="cat_theme_overview.php?delete=true&id=' . MyCrypt::encrypt($item['id']) . '">
                                        <i class="fa fa-trash"></i></a>' ?>
                    </td>
                </tr>
            <? } ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>
