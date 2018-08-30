<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- header -->
<?php $this->load->view('templates/header'); ?>
<!-- ./header -->

<header>
	<div class="container">
		<div class="menu-lang">
			<ul>
				<li class="info">
					<a href="<?= $about_menu_item['link'] ?>"><?= $about_menu_item['text'] ?></a>
				</li>
				<?php foreach ($available_languages as $language) : ?>
				<li>
					<a href="<?= $language['link'] ?>"><?= $language['language'] ?></a>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<h1 class="logo-interno">
			<a href="<?= base_url($this->input->cookie('language')) ?>"></a>
		</h1>
	</div>
</header>

<section>
	<div class="breadcrumb">
		<div class="container">
			<div class="row">
				<div class="breadcrumb-path">
					<ul>
						<li>
							<a href="<?= base_url($this->input->cookie('language')) ?>">Home</a>
                        </li>
                        
                        <li>
                            <a href="<?= $about_menu_item['link'] ?>"><?= $about_menu_item['text'] ?></a>
                        </li>
                        
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

<?= $page['content']['rendered'] ?>

<section>
    <div class="container">
        <div class="sci-accordion">
            <?php foreach($page['acf']['acordeons'] as $key => $acordeon):?>
            <div class="row row-accordion">
                <div class="col-xs-12">
                    <h3><a href="#accordion-<?= $key ?>" data-toggle="tab" class="btn btn-accordion"><?= $acordeon['title'] ?></a></h3>
                </div>
            </div>
            <div class="row row-accordion-content" id="accordion-<?= $key ?>">
                <div class="col-xs-12">
                    <?= $acordeon['content'] ?>
                </div>
            </div>
            <?php endforeach;?>            
        </div>
    </div>
</section>

<!-- footer -->
<?php $this->load->view('templates/footer'); ?>
<!-- ./footer -->