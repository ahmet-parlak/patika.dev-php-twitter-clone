<!-- Footer -->



<!-- REQUIRED SCRIPTS -->
<script src="<?= assets('dist/bundle.js') ?>"></script>
<script src="<?= assets('js/script.js') ?>"></script>

<?php
if ($scripts ?? false) {
    foreach ($scripts as $script) { ?>

        <script src="<?= assets($script) ?>"></script>

        <?php
    }
}
?>