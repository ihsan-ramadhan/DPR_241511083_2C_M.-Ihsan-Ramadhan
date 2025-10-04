<?php $uri = service('uri'); ?>
<nav class="bg-blue-500 shadow-md">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <div class="flex items-center space-x-8">
            <a class="text-xl font-bold text-white" href="<?= base_url('/public/dashboard') ?>">Aplikasi Gaji DPR</a>

            <div class="hidden md:flex items-center space-x-1">
                <a href="<?= base_url('/public/dashboard') ?>" 
                   class="px-3 py-2 rounded-md text-sm font-medium <?= ($uri->getSegment(2) == 'dashboard') ? 'bg-blue-600 text-white' : 'text-white' ?> hover:bg-blue-600 hover:text-white">
                   Dashboard
                </a>
                <a href="<?= base_url('/public/anggota') ?>" 
                   class="px-3 py-2 rounded-md text-sm font-medium <?= ($uri->getSegment(2) == 'anggota') ? 'bg-blue-600 text-white' : 'text-white' ?> hover:bg-blue-600 hover:text-white">
                   Data Anggota
                </a>
                <a href="<?= base_url('/public/penggajian') ?>" 
                   class="px-3 py-2 rounded-md text-sm font-medium <?= ($uri->getSegment(2) == 'penggajian') ? 'bg-blue-600 text-white' : 'text-white' ?> hover:bg-blue-600 hover:text-white">
                   Data Penggajian
                </a>
            </div>
        </div>

        <div class="flex items-center">
            <a href="<?= base_url('/logout') ?>" class="logout-link px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-md hover:bg-red-600">Logout</a>
        </div>
    </div>
</nav>