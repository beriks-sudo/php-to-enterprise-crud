<?php
$status = 'active';
$statusLabel = match ($status) {
    'active' => 'Visible',
    'draft' => 'Draft',
    'archived' => 'Archived',
    default => 'Unknown',
};

echo $statusLabel . "\n";