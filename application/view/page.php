<?php
require_once dirname(__FILE__).'/common/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-12 mt-5 mb-3">
            <div class="article-title"><?php echo htmlspecialchars($data['name'])?></div>
            <div class="content">
                <?php echo htmlspecialchars($data['content'])?>
            </div>
        </div>
    </div>
</div>
<?php
require_once dirname(__FILE__).'/common/footer.php';
?>