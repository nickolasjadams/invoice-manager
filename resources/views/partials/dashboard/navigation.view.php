<?php

use App\Helpers\Request;
use App\Helpers\Session;

?>

<ul class="skip-nav">
    <li><a href="#main-wrapper">Skip to Main Content</a></li>
</ul>

<button id="nav-toggle"><i class="fas fa-bars"></i></button>
<nav id="main-nav" class="sidenav">
    <img class="logo" src="/images/logo.png" alt="Logo">
    <ul>

        <li class="<?= Request::active('dashboard') ? ' active' : ''; ?>">
            <a href="/dashboard">
                <i class="fas fa-chart-line" title="Dashboard"></i><span class="word">Dashboard</span>
            </a>
        </li>

        <?php if (Session::user()->isAdmin()) : ?>
            <li class="<?= Request::active('partners') ? ' active' : ''; ?>">
                <a href="/partners">
                    <i class="fas fa-users-cog" title="Partners"></i><span class="word">Partners</span>
                </a>
            </li>
            <li class="<?= Request::active('invoices') ? ' active' : ''; ?>">
                <a href="/invoices">
                    <i class="fas fa-envelope-open-text" title="View Invoices"></i><span class="word">View Invoices</span>
                </a>
            </li>
            <li class="<?= Request::active('create') ? ' active' : ''; ?>">
                <a href="/create">
                    <i class="fas fa-paper-plane" title="Send Invoice"></i><span class="word">Send Invoice</span>
                </a>
            </li>
        <?php else : ?>
            <li class="<?= Request::active('invoices') ? ' active' : ''; ?>">
                <a href="/invoices">
                    <i class="fas fa-envelope-open-text" title="Invoices"></i><span class="word">Invoices</span>
                </a>
            </li>
        <?php endif ?>

        
        <li class="<?= Request::active('my-account') ? ' active' : ''; ?>">
            <a href="/my-account">
                <i class="fas fa-user-circle" title="My Account"></i><span class="word">My Account</span>
            </a>
        </li>
        <li>
            <a href="/logout">
                <i class="fas fa-power-off" title="Logout"></i><span class="word">Logout</span>
            </a>
        </li>
    </ul>
</nav>