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
                <input name="new_theme_info" <? if(!MyCrypt::is_superadmin()){echo 'maxlength=10';} ?>type="text" placeholder="Beschreibung">
                <button>+</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <? if(MyCrypt::is_superadmin()){ ?>
                            <th>ID</th>
                        <? } ?>
                        <th>Name</th>
                        <th>Beschreibung</th>
                        <? if(MyCrypt::is_superadmin()){ ?>
                            <th>Stimmen</th>
                        <? } ?>
                        <th width="10%">Aktion</th>
                    </tr>
                </thead>
                <tbody>
            <? foreach ($rows as $item){ ?>
                <tr <? if($item['no_vote'] != 0 && $item['no_vote'] != ''){echo 'style="background-color: red"';} ?>>
                    <? if(MyCrypt::is_superadmin()){ ?>
                        <td><?= $item['id']?></td>
                    <? } ?>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['info'] ?></td>
                    <? if(MyCrypt::is_superadmin()){ ?>
                        <td><?= $item['count'] ?></td>
                    <? } ?>
                    <td><?= '<a href="cat_theme_overview.php?vote=true&id=' . MyCrypt::encrypt($item['id']) . '">
                                        <i class="fas fa-thumbs-up"></i></a>' ?>
                        <? if(MyCrypt::is_superadmin()){echo '<a href="cat_theme_overview.php?delete=true&id=' . MyCrypt::encrypt($item['id']) . '">
                                        <i class="fa fa-trash"></i></a>';}  ?>
                        <?= '<a href="cat_theme_overview.php?novote=true&id=' . MyCrypt::encrypt($item['id']) . '">
                                        <i style="color: red;" class="far fa-stop-circle"></i>' ?>
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
