<?php 
  $args = [
    'post_type'   => 'counseling',
  ];
  $counselings = new WP_QUERY( $args );
?>

<table>
  <thead>
    <tr>
      <th>Schwerpunkt</th>
      <th>Organisation</th>
      <th>Telefon</th>
      <th>Email</th>
    </tr>
  </thead>

  <tbody>
    <?php if ( $counselings->have_posts() ): ?>
      <?php while ($counselings->have_posts()) : $counselings->the_post(); ?>
        <tr>
          <td>
            <?php the_field('schwerpunkt'); ?>
          </td>
          <td>
            <?php the_field('organisation'); ?>
          </td>
          <td>
            <?php the_field('telefon'); ?>
          </td>
          <td>
            <?php the_field('email'); ?>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <h3>Keine Beratungsstellen gefunden.</h3>
    <?php endif; ?>
  </tbody>
</table>
