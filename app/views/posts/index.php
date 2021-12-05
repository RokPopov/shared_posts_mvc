<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6">
      <h1>Posts</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-dark float-end">
        <i class="fa fa-pencil"></i> Add Post
      </a>
    </div>
  </div>
  <?php foreach($data['posts'] as $post) : ?>
    <div class="card card-body mb-3 bg-dark">
      <h4 class="card-title text-light"><?php echo $post->title; ?></h4>
      <p class="card-text text-secondary">Written by  <?php echo $post->name; ?> on <?php echo $post->postCreated; ?></p>
      <p class="card-text text-light"><?php echo $post->body; ?></p>
      <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-secondary">More</a>
    </div>
  <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>