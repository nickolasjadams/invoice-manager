<?php

namespace App\Helpers;

abstract class Status {
    const DRAFT     = 'draft';
    const SENT      = 'sent';
    const CANCELLED = 'cancelled';
    const UNPAID    = 'unpaid';
}