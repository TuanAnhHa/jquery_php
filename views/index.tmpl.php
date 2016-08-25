<?php include '_partials/header.php'; ?>
<div id="lead-in">
    <h1>Search Favorite Actors <small>using jQuery - Ajax - PHP</small></h1>
    <h3>Please select a letter below:</h3>
</div>

<div id="form-query">
    <form id="actor-selection" action="index.php" method="POST">
        <div class="form-group">
            <select id="q" name="q" class="form-control">
                <option value='#' selected>His/her lastname begins with letter...</option>
                <?php
                $alphabet = str_split('abcdefghijklmnopqrstuvwxyz'); // an Array of Letters
                foreach ($alphabet as $letter) {
                    echo "<option value='$letter'>$letter</option>";
                }
                ?>
            </select>
        </div>
    </form>
</div>

<div id="query-result">
    <h4 class="lead-in">
        Query results:
    </h4>
    <hr/>
    <ul class="actors_list list-group">
        <?php if(isset($actors)):
            foreach ($actors as $actor) {
                echo "<li class='list-group-item' data-actor_id='{$actor->actor_id}'>
                        <a href='actor.php?actor_id={$actor->actor_id}'>
                            {$actor->first_name} {$actor->last_name}
                        </a>
                    </li>";
            }
        endif; ?>
        <script id="actor_list_template" type="text/x-handlebars-template">
            {{#each this}}
            <li data-actor_id="{{actor_id}}">
                {{fullName this}}
            </li>
            {{/each}}
        </script>
    </ul>
</div>
<?php include '_partials/footer.php'; ?>
