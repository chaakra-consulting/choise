<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<div class="container">
    <h1>Your Holland Code: <?php echo $code; ?></h1>
    <p>Suggested Careers:</p>
    <ul>
        <?php foreach ($careers as $career): ?>
            <li><?php echo $career; ?></li>
        <?php endforeach; ?>
    </ul>
    <p>For full results, upgrade to premium.</p>
</div>

<?php $this->load->view('layout3/footer') ?>
