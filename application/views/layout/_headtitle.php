<!-- Page Header-->
<header class="masthead" style="background-image: url('<?= base_url() ?>asset/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <?php if ($in['data']['statuspagehead'] != 1) : ?>
                        <h1>Blog Stater</h1>
                    <?php else : ?>
                           <h1><?= $in['data']['titlepagehead'] ?></h1>
                    <?php endif ?>
                    <span class="subheading">Halaman ini dibuat untuk keperluan belajar yofandi</span>
                </div>
            </div>
        </div>
    </div>
</header>