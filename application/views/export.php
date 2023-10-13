<!DOCTYPE html>
<html>

<head>
    <title>Tutorial Export Dengan Codeigniter</title>
</head>

<body>
    <a href="<?php echo base_url('Export/export'); ?>">Export Data</a>
    <table border="1" cellspacing="0">
        <thead>
            <tr>
                <th style="width: 7%; text-align: center;">No</th>
                <th style="width: 30%">Jenis</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1; ?>
            <?php foreach ($jenis as $j) : ?>
                <tr>
                    <td style="width: 7%; text-align: center;"><?php echo $index++; ?></td>
                    <td style="width: 30%"><?php echo $j->nama_jenis; ?></td>
                <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>