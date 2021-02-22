<div class="topNav">
    <div class="container">
        <ul>
            <?php if(current_user() == ''): ?>
                <li>
                    <a href="<?= base_url('login') ?>">Login</a>
                </li>
                <li>
                    <a href="<?= base_url('register') ?>">Register</a>
                </li>
                <?php else: ?>
                    <?php if(current_user()->is_admin): ?>
                        <li>
                            <a href="<?= base_url('admin/dashboard') ?>">Dashboard</a>
                        </li>
                        <?php else: ?>
                            <li>
                                <a href="<?= base_url('account') ?>">Account</a>
                            </li>
                        <?php endif; ?>

                        <li>
                            <a href="<?= base_url('logout') ?>">Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>