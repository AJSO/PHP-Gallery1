<?php $this->view("minima/header", $data); ?>
<main role="main">
    <article>
        <section class="section background-white">
        <div class="s-12 m-12 l-4 center">
            <h4 class="text-size-20 margin-bottom-20 text-dark text-center">Upload an image</h4>
            <p><?php check_message() ?></p>
            <form name="contactForm" class="customform" method="post" enctype="multipart/form-data">
            <div class="s-12"> 
                <input name="title" class="subject" placeholder="Image Title" title="Image Title" type="text" required>
                <p class="subject-error form-error">Please enter an Image Title.</p>
            </div>
            <div class="s-12"> 
                <input name="image_file" type="file" required>
                <p class="subject-error form-error">Please Selet an image file.</p>
            </div>
            <div class="s-12">
                <textarea name="description" class="required message" placeholder="Image description" rows="3" required></textarea>
                <p class="message-error form-error">Please enter Image description.</p>
            </div>
            <div class="s-12"><button class="s-12 submit-form button background-primary text-white" type="submit">Submit Button</button></div>
            </form>
        </div>           
        </section> 
    </article>
</main>
<?php $this->view("minima/footer", $data); ?>