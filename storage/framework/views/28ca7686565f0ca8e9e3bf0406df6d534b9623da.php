<table class="table table-responsive" id="penganggurans-table">
    <thead>
        <tr>
            <th>Kode</th>
        <th>Nama Lengkap</th>
        <th>Pendidikan Terakhir</th>
        <th>Peminatan</th>
        <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $penganggurans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengangguran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if(Auth::user()->id == $pengangguran->user_id): ?>
        <?php $__currentLoopData = $dkms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dkm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(Auth::user()->id == $dkm->user_id): ?>
        <tr>
            <td><?php echo $pengangguran->kode; ?></td>
            <td><?php echo $pengangguran->nama_lengkap; ?></td>
            <td><?php echo $pengangguran->pendidikan_terakhir; ?></td>
            <td><?php echo $pengangguran->peminatan; ?></td>
            <td>
              <?php if($pengangguran->status == "Menganggur"): ?>
                <font color="green">
              <?php elseif($pengangguran->status == "Belajar"): ?>
                <font color="blue">
              <?php else: ?>
                <font color="red">
              <?php endif; ?>
              <b><?php echo $pengangguran->status; ?></b>
            </td>
            <td>
                <?php echo Form::open(['route' => ['penganggurans.destroy', $pengangguran->id], 'method' => 'delete']); ?>

                <div class='btn-group'>
                    <a href="<?php echo route('penganggurans.show', [$pengangguran->url]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="<?php echo route('penganggurans.edit', [$pengangguran->url]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
                <?php echo Form::close(); ?>

            </td>
        </tr>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
