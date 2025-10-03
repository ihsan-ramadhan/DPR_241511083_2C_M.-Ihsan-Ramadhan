<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
    Login
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?php if (session()->getFlashdata('error')) : ?>
    <div id="auth-notification" class="fixed top-5 right-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-lg flex items-center" role="alert">
        <span class="block sm:inline mr-4"><?= session()->getFlashdata('error') ?></span>
        <button id="close-notification" class="text-red-700 hover:text-red-900">
            <span class="text-2xl">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <div class="flex items-center justify-center min-h-screen bg-slate-100">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-xl shadow-lg">
            
            <h2 class="text-2xl font-bold text-center text-slate-700">Login Aplikasi Gaji DPR</h2>

            <form id="login-form" action="<?= base_url('auth/login') ?>" method="post" class="space-y-6" novalidate>
                <?= csrf_field() ?>
                <div>
                    <label for="username" class="block text-sm font-medium text-slate-600">Username</label>
                    <input type="text" id="username" name="username"
                           class="w-full px-3 py-2 mt-1 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p id="username-error" class="text-xs text-red-500 mt-1 hidden">Username harus diisi.</p>
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-600">Password</label>
                    <input type="password" id="password" name="password"
                           class="w-full px-3 py-2 mt-1 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p id="password-error" class="text-xs text-red-500 mt-1 hidden">Password harus diisi.</p>
                </div>
                
                <div>
                    <button type="submit"
                            class="w-full px-4 py-2 font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-colors">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php if (session()->getFlashdata('error')) : ?>
    <script>
        const notification = document.getElementById('auth-notification');
        const closeButton = document.getElementById('close-notification');

        function hideNotification() {
            if (notification) {
                notification.style.display = 'none';
            }
        }

        const autoCloseTimer = setTimeout(hideNotification, 5000);

        if (closeButton) {
            closeButton.addEventListener('click', function() {
                clearTimeout(autoCloseTimer);
                hideNotification();
            });
        }
    </script>
    <?php endif; ?>
    <script>
        const loginForm = document.getElementById('login-form');
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');
        const usernameError = document.getElementById('username-error');
        const passwordError = document.getElementById('password-error');

        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();

            let isValid = true;

            if (usernameInput.value.trim() === '') {
                usernameInput.classList.add('border-red-500');
                usernameError.classList.remove('hidden');
                isValid = false;
            } else {
                usernameInput.classList.remove('border-red-500');
                usernameError.classList.add('hidden');
            }

            if (passwordInput.value.trim() === '') {
                passwordInput.classList.add('border-red-500')
                passwordError.classList.remove('hidden');
                isValid = false;
            } else {
                passwordInput.classList.remove('border-red-500');
                passwordError.classList.add('hidden');
            }

            if (isValid) {
                loginForm.submit();
            }
        });

        usernameInput.addEventListener('input', function() {
            if (this.value.trim() !== '') {
                this.classList.remove('border-red-500');
                usernameError.classList.add('hidden');
            }
        });
        passwordInput.addEventListener('input', function() {
             if (this.value.trim() !== '') {
                this.classList.remove('border-red-500');
                passwordError.classList.add('hidden');
            }
        });
    </script>
<?= $this->endSection() ?>