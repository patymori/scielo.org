<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- header -->
<?php $this->load->view('templates/header'); ?>
<!-- ./header -->

<!-- language-menu -->
<?php $this->load->view('templates/language-menu'); ?>
<!-- ./language-menu -->

<section>
	<div class="breadcrumb">
		<div class="container">
			<div class="row">
				<div class="breadcrumb-path">
					<ul>
						<?php foreach ($breadcrumbs as $breadcrumb) : ?>
						<li>
							<a href="<?= $breadcrumb['link'] ?>"><?= $breadcrumb['link_text'] ?></a>
                        </li>
						<?php endforeach; ?>
						<li>
							<?= $page['title']['rendered'] ?>
                        </li>
					</ul>
				</div>
			</div>
			<div class="row">

				<div class="col-xs-12 col-sm-8 col-md-9">
					<h2 class="breadTitle"><?= $page['title']['rendered'] ?></h2>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3">
					<!-- share -->
					<?php $this->load->view('templates/share'); ?>
					<!-- ./share -->
				</div>
			</div>
		</div>
	</div>
</section>

<section class="collection collectionAbout">
    <div class="container">
        <?php if (!empty($page['content']['rendered'])) : ?>
            <div class="row">
                <div class="col-xs-12">
                    <?= $page['content']['rendered'] ?>
                </div>        
            </div>
		<?php endif; ?>

        <div class="list">
            <ul>
                <?php foreach ($page['acf']['bibliography'] as $bibliography) : ?>
                <?php 
                $icon = 'ico-link';

                if ($bibliography['type'] == 'PDF') {
                    $icon = 'ico-pdf';
                }

                if ($bibliography['type'] == 'EPUB') {
                    $icon = 'ico-epub';
                }
                ?>
                <li class="<?= $icon ?>">
                    <?= $bibliography['reference'] ?> <a href="<?= $bibliography['available_from'] ?>"><?= $bibliography['available_from'] ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<!-- footer -->
<?php $this->load->view('templates/footer'); ?>
<!-- ./footer -->
