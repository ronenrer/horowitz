<?php 
/*
Template Name: Fullwidth
*/

get_header(); ?>

			<div id="content">
				<div id="inner-content" class="container clearfix">
						
						<div id="main"  role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				
							<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
									<?php if (is_page('5')):?>
										<h2 style="text-align:center">10 עובדות ומספרים אודות פארק המים שפיים:</h2>
										<ol class="special">
											<li>פארק שפיים הינו <strong>פארק המים הראשון</strong> שהוקם בישראל.</li>
											<li>הפארק משתרע על פני <strong>כ100 דונם</strong> של מתקנים ומרחבים מוריקים.</li>
											<li>בפארק <strong>26</strong> מסלולי גלישה ו-<strong>8</strong> מתחמי מים, הנגישים לקהל המבקרים דרך שדרה מרכזית החוצה את הפארק לאורכו.</li>
											<li>בסקר שנערך באמצעות ה"גל החדש" בשנת 2012 נמצא כי פארק המים שפיים הוא <strong>פארק המים הפופולארי ביותר</strong>.</li>
											<li>בחודשים יולי-אוגוסט עובדים בכל יום נתון בפארק למעלה <strong>מ-100</strong> עובדי שטח, מנהלה והצלה.</li>
											<li><strong>כ-150</strong> פחי פסולת מפוזרים בשטחי פארק לנוחיות המבקרים ולשמירה על סביבה אסתטית ונקייה.</li>
											<li>לד מגיל שנתיים ומעלה חייב בכרטיס כניסה לפארק המים שפיים. המחיר אחיד לילד ולמבוגר.</li>
											<li>בעולם הקאריבי לילדים מותקנות <strong>140 מזרקות מים</strong>. ניתן לתזמן אותן למוזיקה ולתאורה.</li>
											<li>דלי המים הענק באותו מתחם מתרוקן לצהלות הילדים בכל <strong>4 דקות</strong>.</li>
										</ol>
									<?php endif;?>
									<?php 
									if( have_rows('faq') ):
										echo ' <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
										$i=1;
										while( have_rows('faq') ): the_row(); 
											$quest =  get_sub_field('quest') ;	
											$answer =  get_sub_field('answer');?>
											<div class="panel panel-default">
									   			 <div class="panel-heading" role="tab" id="headingOne">
									  			    <h4 class="panel-title">
									      			  <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne">
									   			       <?php echo $quest?>
									       			 </a>
									    			</h4>
									  			  </div>
									 			   <div id="collapse-<?php echo $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?php echo $i; ?>">
												      <div class="panel-body">
												      	 <?php echo $answer?>
												      </div>
												    </div>
									 			</div>													
										<?php  $i++; endwhile;
										echo '</div>';	
									endif;
									 ?>
							</section>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

				</div>

			</div>

<?php get_footer(); ?>
