<?php
use App\Helpers\DateTimeX as DateTime;

$title = 'Manage Partners';
$css = [];
$js = ['js/edit-partner.js'];
$heading = "Manage Partners";
include 'partials/dashboard/beginlayout.view.php';
?>

<table>
    <tr>
        <th>ID</th>
        <th>Company Name</th>
        <th>Name</th>
        <th>Verified</th>
        <th>Active</th>
        <th>Partner Since</th>
    </tr>

    <?php if (sizeof($partners) === 0) : ?>
        <tr><td colspan="5"><p class="mb0 p30 tac">No partners found.</p></td></tr>
    <?php endif ?>

    <?php foreach ($partners as $partner): ?>
        <tr data-id='<?= $partner->id(); ?>'>
            <td><a href="partners?id=<?= $partner->id(); ?>"><?= $partner->id(); ?></a></td>
            <td><?= $partner->company_name; ?></td>
            <td><?= $partner->first_name . ' ' . $partner->last_name; ?></td>
            <td><?= boolean_emoji($partner->verified()) ?></td>
            <td><?= boolean_emoji($partner->active()) ?></td>
            <td><?= DateTime::displayFormat($partner->created_at); ?></td>
        </tr>
    <?php endforeach ?>

</table>

<div id="edit-frame" class="mt20 p20">
    <div><strong>Company: </strong><span id="company_name"></span></div>
    <div><strong>Name: </strong><span id="first_name"></span> <span id="last_name"></span></div>
    <div><strong>Email: </strong><span id="email"></span></div>
    <div><strong>Phone: </strong><span id="phone"></span></div>
    <div><strong>Address: </strong><span id="address"> </span><span id="suite"></span> <span id="city"></span> <span id="state"></span>, <span id="zip"></span></div>
    <div><strong>Created at: </strong><span id="created_at"></span></div>
    <div id="actions" class="mt20"></div>

</div>

<?php
include 'partials/dashboard/footer.view.php';
include 'partials/dashboard/endlayout.view.php';
?>