<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Aplikasi Gaji DPR</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen">

    <?= $this->renderSection('content') ?>

    <footer class="bg-white border-t border-slate-200 mt-auto">
        <div class="container mx-auto px-6 py-4 text-center text-sm text-slate-500">
            &copy; <?= date('Y') ?> Aplikasi Gaji DPR. Dibuat oleh M. Ihsan Ramadhan.
        </div>
    </footer>

    <div id="logout-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-xl p-6 w-full max-w-sm text-center">
            <h3 class="text-lg font-semibold text-slate-800 mb-4">Konfirmasi Logout</h3>
            <p class="text-slate-600 mb-6">Apakah Anda yakin ingin keluar dari sesi ini?</p>
            <div class="flex justify-center space-x-4">
                <button id="cancel-logout" class="px-6 py-2 text-sm font-medium text-slate-700 bg-slate-100 rounded-md hover:bg-slate-200">
                    Batal
                </button>
                <a id="confirm-logout" href="#" class="px-6 py-2 text-sm font-medium text-white bg-red-500 rounded-md hover:bg-red-600">
                    Ya, Keluar
                </a>
            </div>
        </div>
    </div>

    <div id="delete-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-xl p-6 w-full max-w-sm text-center">
            <h3 class="text-lg font-semibold text-slate-800 mb-4">Konfirmasi Hapus</h3>
            <p class="text-slate-600 mb-6">Apakah Anda yakin ingin menghapus data anggota <strong id="delete-member-name" class="text-slate-900"></strong>?</p>
            <div class="flex justify-center space-x-4">
                <button id="cancel-delete" class="px-6 py-2 text-sm font-medium text-slate-700 bg-slate-100 rounded-md hover:bg-slate-200">
                    Batal
                </button>
                <a id="confirm-delete" href="#" class="px-6 py-2 text-sm font-medium text-white bg-red-500 rounded-md hover:bg-red-600">
                    Ya, Hapus
                </a>
            </div>
        </div>
    </div>

    <script>
        const logoutModal = document.getElementById('logout-modal');
        const cancelLogoutButton = document.getElementById('cancel-logout');
        const confirmLogoutButton = document.getElementById('confirm-logout');
        const logoutLinks = document.querySelectorAll('.logout-link');

        logoutLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const logoutUrl = this.href;
                confirmLogoutButton.href = logoutUrl;
                logoutModal.classList.remove('hidden');
            });
        });

        function hideLogoutModal() {
            logoutModal.classList.add('hidden');
        }

        cancelLogoutButton.addEventListener('click', hideLogoutModal);

        logoutModal.addEventListener('click', function(event) {
            if (event.target === this) {
                hideLogoutModal();
            }
        });
    </script>
    <script>
        const deleteModal = document.getElementById('delete-modal');
        if (deleteModal) {
            const cancelDeleteButton = document.getElementById('cancel-delete');
            const confirmDeleteButton = document.getElementById('confirm-delete');
            const deleteMemberName = document.getElementById('delete-member-name');
            const deleteLinks = document.querySelectorAll('.delete-link');

            deleteLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const memberName = this.dataset.name;
                    const deleteUrl = this.href;
                    deleteMemberName.textContent = memberName;
                    confirmDeleteButton.href = deleteUrl;
                    deleteModal.classList.remove('hidden');
                });
            });

            function hideDeleteModal() {
                deleteModal.classList.add('hidden');
            }

            cancelDeleteButton.addEventListener('click', hideDeleteModal);

            deleteModal.addEventListener('click', function(event) {
                if (event.target === this) {
                    hideDeleteModal();
                }
            });
        }
    </script>
    <script>
        const globalNotification = document.getElementById('global-notification');
        if (globalNotification) {
            const closeButton = globalNotification.querySelector('#close-notification');

            function hideGlobalNotification() {
                if (globalNotification) {
                    globalNotification.style.display = 'none';
                }
            }

            const autoCloseTimer = setTimeout(hideGlobalNotification, 5000);

            if (closeButton) {
                closeButton.addEventListener('click', function() {
                    clearTimeout(autoCloseTimer);
                    hideGlobalNotification();
                });
            }
        }
    </script>
    <?= $this->renderSection('scripts') ?>

</body>
</html>