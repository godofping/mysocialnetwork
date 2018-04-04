<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> retour</a>
      <div class="card card-body bg-light mt-5">
        <h2>Editer le Post</h2>
        <p>Changer des detailles du post</p>
        <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
          <div class="form-group">
              <label>Titre:<sup>*</sup></label>
              <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
              <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
          </div>    
          <div class="form-group">
              <label>Corp:<sup>*</sup></label>
              <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
          </div>
          <div class="form-group">
            <label>Visibilite:<sup>*</sup></label>
            <select class="form-control" id="viewable" name="viewable">
              <option>Private</option>
              <option>Public</option>
              <option>Friends</option>
              <option>YouOnly</option>
            </select>
          </div>
          <input type="submit" class="btn btn-success" value="Publier">
        </form>
      </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>