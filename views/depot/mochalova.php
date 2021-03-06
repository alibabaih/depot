<!--jQuery Data Tables-->
<script>
    $(document).ready()
</script>
<div id="content-wrapper">
    <div class="page-header">
        <h1><i class="fa fa-upload page-header-icon"></i>&nbsp;&nbsp;Склад
        </h1>
    </div>


    <div class="panel">
    <div class="panel-heading">
        <span class="panel-title">Список отчётов</span>
    </div>
    <div class="panel-body" style="overflow-x: scroll;">
        <div class="row">
            <?php foreach ($this->mochalova1 as $key => $value) : ?>
                <?php number_format($value['total_sold'], 3, '.', ''); ?>
                <?php $new_arr[] = $value['total_sold']; ?>
            <?php endforeach; ?>
            <?php foreach ($this->mochalova3itemsWereMovedToOktabrskaya as $key => $value) : ?>
                <?php number_format($value['total_moved'], 3, '.', ''); ?>
                <?php $new_arr2[] = $value['total_moved']; ?>
            <?php endforeach; ?>
            <?php foreach ($this->mochalova3itemsWereTakenFromOktabrskaya as $key => $value) : ?>
                <?php number_format($value['total_taken'], 3, '.', ''); ?>
                <?php $new_arr3[] = $value['total_taken']; ?>
            <?php endforeach; ?>

            <div class="col-sm-12">
                <table  style="font-size: 13px;"  cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" >
            <thead>
            <tr>
                <th class="text-center">Арт.</th>
                <th class="text-center">Название</th>
                <th class="text-center">Инвентаризация</th>
                <th class="text-center">Закуплено</th>
                <th class="text-center">Сбыто</th>
                <th class="text-center">Перемещено на Октябрьскую</th>
                <th class="text-center">Перемещено с Октябрьской</th>
                <th class="text-center">Остаток</th>
                <th class="text-center">Цена шт, руб</th>
                <th class="text-center">Итого, руб</th>
            </tr>
            </thead>
            <tbody>
            <?php $count1 = 0; $count2 = 0;
            foreach ($this->mochalova2 as $key => $value) :
                $sum_item = $value['quantity_august_Mochalova'] + $value['total_bought'] - $new_arr[$count1] - $new_arr2[$count2] + $new_arr3[$count2]; ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo number_format($value['quantity_august_Mochalova'], 2, '.', ''); ?></td>
                    <td><?php echo number_format($value['total_bought'], 2, '.', ''); ?></td>
                    <td><?php echo number_format($new_arr[$count1], 2, '.', ''); ?></td>
                    <td ><?php echo number_format($new_arr2[$count1], 2, '.', ''); ?></td>
                    <td ><?php echo number_format($new_arr3[$count1], 2, '.', ''); ?></td>
                    <td ><?php echo number_format($sum_item, 2, '.', ''); ?></td>
                    <td><?php echo $value['isc_cost'] * EURO; ?></td>
                    <td><?php echo number_format($sum_item * ($value['isc_cost'] * EURO), 2, '.', ''); ?></td>
                    <?php $count1++; $count2++; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
            </div>
            </div>
    </div>
</div>

</div>
