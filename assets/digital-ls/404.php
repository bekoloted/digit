<?php get_header(); ?>

<div class="mt-40">
</div>
    <div class="w-full">
        <!-- First row -->
        <div class="w-full justify-center grid grid-cols-1 lg:grid-cols-2 px-8 py-[6rem] bg-[#bcbcbc]">
          <div class="text-[1.5rem]">
					<h2><?php _e( "Not Found", get_home_url() ); ?></h2>
					<p><?php _e( "La page que vous demandez n'est pas disponible pour le moment", get_home_url() ); ?></p>

          </div>
        </div>
    </div>

<?php get_footer(); ?>