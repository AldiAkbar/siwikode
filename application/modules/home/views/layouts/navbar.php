    <?php $navbar_home = $this->db->get_where('nav_home', ['is_active' => 1])->result_array();
    ?>

    <?php if ($title == 'Beranda') : ?>
        <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top fadeIn" id="mynav">
        <?php else : ?>
            <nav class="navbar navbar-expand-md navbar-dark nav-colored navbar-custom fixed-top">
            <?php endif; ?>
            <div class="container">
                <!-- logo -->
                <a class="navbar-brand logo-image" href="index.html"><img src="<?= base_url() ?>asset/img/SIWIKODE.png"></a>

                <!-- toggle -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- nav item -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">

                        <?php foreach ($navbar_home as $nh) : ?>
                            <?php if ($nh['title'] == $title) :  ?>
                                <li class="nav-item-active">
                                <?php else : ?>
                                <li class="nav-item">
                                <?php endif; ?>
                                <a class="nav-link page-scroll" href="<?= base_url($nh['url']); ?>"><?= $nh['title']; ?></a>
                                </li>
                            <?php endforeach; ?>

                            <?php if ($this->session->userdata('email')) : ?>
                                <li class="nav-item dropdown page-scoll button">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="<?= base_url('asset/img/profile/') . $user['image'] ?>" alt="" class="userthumb">
                                    </a>
                                    <?php if ($user['role_id'] == 1) : ?>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="<?= base_url('admin'); ?>">Dashboard</a>
                                            <a class="dropdown-item" href="<?= base_url('logout'); ?>">Logout</a>
                                        </div>
                                    <?php elseif ($user['role_id'] == 3) : ?>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="<?= base_url('writer'); ?>">Profile</a>
                                            <a class="dropdown-item" href="<?= base_url('logout'); ?>">Logout</a>
                                        </div>
                                    <?php else : ?>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="<?= base_url('user'); ?>">Profile</a>
                                            <a class="dropdown-item" href="<?= base_url('logout'); ?>">Logout</a>
                                        </div>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <a href="<?= base_url('auth'); ?>" class="btn btn-solid-lg btn-login">Login</a>
                                <?php endif; ?>
                                </li>
                    </ul>

                </div>
            </div>
            </nav>
            <!-- end navbar -->