<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i> Edit Pertanyaan Holland</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Talent Test</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin-quiz'); ?>">Pertanyaan Holland</a></li>
      <li class="breadcrumb-item"><a href="#">Edit</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <form action="<?php echo base_url('admin-quiz/edit/' . $question->id); ?>" method="post">
            <div class="form-group">
              <label for="question_text">Pertanyaan</label>
              <textarea class="form-control" id="question_text" name="question_text" rows="3" required><?php echo set_value('question_text', $question->question_text); ?></textarea>
              <?php echo form_error('question_text'); ?>
            </div>
            <div class="form-group">
              <label for="type">Tipe RIASEC</label>
              <select class="form-control" id="type" name="type" required>
                <option value="">Pilih Tipe</option>
                <option value="r" <?php echo set_select('type', 'r', ($question->type == 'r')); ?>>Realistic (R)</option>
                <option value="i" <?php echo set_select('type', 'i', ($question->type == 'i')); ?>>Investigative (I)</option>
                <option value="a" <?php echo set_select('type', 'a', ($question->type == 'a')); ?>>Artistic (A)</option>
                <option value="s" <?php echo set_select('type', 's', ($question->type == 's')); ?>>Social (S)</option>
                <option value="e" <?php echo set_select('type', 'e', ($question->type == 'e')); ?>>Enterprising (E)</option>
                <option value="k" <?php echo set_select('type', 'k', ($question->type == 'k')); ?>>Conventional (K)</option>
              </select>
              <?php echo form_error('type'); ?>
            </div>
            <div class="tile-footer">
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="<?php echo base_url('administrator/quiz'); ?>" class="btn btn-secondary">Batal</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<?php $this->load->view('layout/footer'); ?>
