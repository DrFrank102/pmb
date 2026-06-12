<?php get_header(); ?>

<main id="pmb-home" class="pmb-home">

<!-- ═══════════════════════════════════════════════════ HERO -->
<section id="home" class="pmb-hero">
	<div class="pmb-hero__diagonal"></div>
	<div class="pmb-container">
		<div class="pmb-hero__layout">

			<!-- ── Hero content (left) ─────────────────────── -->
			<div class="pmb-hero__content">
				<div class="pmb-hero__inner">
					<div class="pmb-hero__eyebrow">
						<span class="pmb-pill">Est. 3rd Generation</span>
						<span class="pmb-pill">Woburn, MA</span>
						<span class="pmb-pill">Available 24/7</span>
					</div>
				</div>
				<img
					src="https://pmb.kelwynmanor.org/wp-content/uploads/2026/06/PMBoisvert-Plumbing-and-Mechanical-herotext.png"
					alt="P.M. Boisvert Plumbing &amp; Mechanical — 3rd Generation Master Plumber, Greater Boston Area"
					class="pmb-hero__title-img"
				>
				<div class="pmb-hero__inner">
					<div class="pmb-hero__certs">
						<span>MassSave Certified</span>
						<span>NSS Certified</span>
						<span>Navien Technician</span>
					</div>
					<div class="pmb-hero__actions">
						<a href="tel:7814848550" class="pmb-btn pmb-btn--orange">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 1.08h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
							Call Now: 781-484-8550
						</a>
						<a href="#contact" class="pmb-btn pmb-btn--ghost">Book a Service</a>
					</div>
				</div>
			</div><!-- .pmb-hero__content -->

			<!-- ── Contact form (right) ────────────────────── -->
			<div class="pmb-hero__form-col">
				<div class="pmb-form-card">
					<h3 class="pmb-form-card__title">Contact us</h3>
					<p class="pmb-form-card__sub">Leave your contact details and we will call you back.</p>

					<form id="pmb-hero-form" novalidate>
						<div class="pmb-form-card__msg" aria-live="polite"></div>

						<div class="pmb-fc__field">
							<input type="text" name="first_name" placeholder="First name" required>
						</div>
						<div class="pmb-fc__field">
							<input type="text" name="last_name" placeholder="Last name" required>
						</div>
						<div class="pmb-fc__field">
							<input type="tel" name="phone" placeholder="Phone number" required>
						</div>
						<div class="pmb-fc__field">
							<input type="email" name="email" placeholder="Email">
						</div>

						<p class="pmb-fc__section-label">What is your address?</p>

						<div class="pmb-fc__row">
							<div class="pmb-fc__field">
								<input type="text" name="street" placeholder="Street address *" required>
							</div>
							<div class="pmb-fc__field">
								<input type="text" name="unit" placeholder="Unit / apartment / suite">
							</div>
						</div>
						<div class="pmb-fc__row">
							<div class="pmb-fc__field">
								<input type="text" name="city" placeholder="City *" required>
							</div>
							<div class="pmb-fc__field">
								<input type="text" name="zip" placeholder="Zip code *" required>
							</div>
						</div>
						<div class="pmb-fc__row">
							<div class="pmb-fc__field">
								<select name="country">
									<option value="United States" selected>United States</option>
									<option value="Canada">Canada</option>
								</select>
							</div>
							<div class="pmb-fc__field">
								<select name="state">
									<option value="" disabled selected>State *</option>
									<?php
									$states = ['AL'=>'Alabama','AK'=>'Alaska','AZ'=>'Arizona','AR'=>'Arkansas','CA'=>'California','CO'=>'Colorado','CT'=>'Connecticut','DE'=>'Delaware','FL'=>'Florida','GA'=>'Georgia','HI'=>'Hawaii','ID'=>'Idaho','IL'=>'Illinois','IN'=>'Indiana','IA'=>'Iowa','KS'=>'Kansas','KY'=>'Kentucky','LA'=>'Louisiana','ME'=>'Maine','MD'=>'Maryland','MA'=>'Massachusetts','MI'=>'Michigan','MN'=>'Minnesota','MS'=>'Mississippi','MO'=>'Missouri','MT'=>'Montana','NE'=>'Nebraska','NV'=>'Nevada','NH'=>'New Hampshire','NJ'=>'New Jersey','NM'=>'New Mexico','NY'=>'New York','NC'=>'North Carolina','ND'=>'North Dakota','OH'=>'Ohio','OK'=>'Oklahoma','OR'=>'Oregon','PA'=>'Pennsylvania','RI'=>'Rhode Island','SC'=>'South Carolina','SD'=>'South Dakota','TN'=>'Tennessee','TX'=>'Texas','UT'=>'Utah','VT'=>'Vermont','VA'=>'Virginia','WA'=>'Washington','WV'=>'West Virginia','WI'=>'Wisconsin','WY'=>'Wyoming'];
									foreach ( $states as $abbr => $name ) {
										printf( '<option value="%s">%s</option>', esc_attr( $abbr ), esc_html( $name ) );
									}
									?>
								</select>
							</div>
						</div>

						<div class="pmb-fc__field">
							<input type="text" name="service" placeholder="Service details">
						</div>
						<div class="pmb-fc__field">
							<input type="text" name="referral" placeholder="How did you hear about us?">
						</div>

						<label class="pmb-fc__consent">
							<input type="checkbox" name="consent">
							<span>By checking this box, I consent to receive marketing and promotional text messages from PM Boisvert Plumbing and Mechanical at the phone number I have provided above. Message and data rates may apply. Message frequency varies. Reply HELP for help and STOP to stop. I consent to the <a href="/terms-of-service">Terms of Service</a> and <a href="/privacy-policy">Privacy Policy</a>.</span>
						</label>

						<button type="submit" class="pmb-form-card__submit">Contact us</button>
					</form>
				</div><!-- .pmb-form-card -->
			</div><!-- .pmb-hero__form-col -->

		</div><!-- .pmb-hero__layout -->
	</div>
</section>


<!-- ═══════════════════════════════════════════════════ ABOUT -->
<section id="about" class="pmb-about pmb-section">
	<div class="pmb-container pmb-about__layout">
		<div class="pmb-about__copy">
			<div class="pmb-eyebrow">About Us</div>
			<h2 class="pmb-heading">A Tradition of<br>Master Craftsmanship</h2>
			<p>Patrick Boisvert is a <strong>3rd generation Master Plumber</strong> with over 15 years of hands-on experience serving Woburn and the greater North Boston area. A certified MassSave contractor and factory-trained Navien technician, Patrick brings a family-first approach and unmatched work ethic to every job &mdash; large or small.</p>
			<p>Whether it&rsquo;s a 2am emergency or a planned upgrade, P.M. Boisvert Plumbing &amp; Mechanical delivers the kind of honest, expert service that&rsquo;s been earned across three generations.</p>
			<div class="pmb-about__creds">
				<div class="pmb-cred-card">
					<div class="pmb-cred-card__icon">
						<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg>
					</div>
					<div class="pmb-cred-card__name">Master Plumber</div>
					<div class="pmb-cred-card__sub">Licensed &amp; Insured</div>
				</div>
				<div class="pmb-cred-card">
					<div class="pmb-cred-card__icon">
						<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
					</div>
					<div class="pmb-cred-card__name">MassSave Certified</div>
					<div class="pmb-cred-card__sub">Energy Efficiency</div>
				</div>
				<div class="pmb-cred-card">
					<div class="pmb-cred-card__icon">
						<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26 12,2"/></svg>
					</div>
					<div class="pmb-cred-card__name">NSS Certified</div>
					<div class="pmb-cred-card__sub">Industry Standard</div>
				</div>
				<div class="pmb-cred-card">
					<div class="pmb-cred-card__icon">
						<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M12 2c0 6-8 8-8 14a8 8 0 0016 0c0-6-8-8-8-14z"/></svg>
					</div>
					<div class="pmb-cred-card__name">Navien Technician</div>
					<div class="pmb-cred-card__sub">Factory Trained</div>
				</div>
			</div>
			<a href="tel:7814848550" class="pmb-btn pmb-btn--navy pmb-btn--mt">Call Us Today</a>
		</div>
	</div>
</section>

<!-- ═══════════════════════════════════════════════════ BRANDS -->
<section class="pmb-brands pmb-section--light">
	<div class="pmb-container pmb-brands__layout">
		<div class="pmb-eyebrow">Brands We Service</div>
		<div class="pmb-brands__row">
			<div class="pmb-brand">Rinnai</div>
			<div class="pmb-brand">Lochinvar</div>
			<div class="pmb-brand">Navien</div>
			<div class="pmb-brand">Ideal</div>
		</div>
	</div>
</section>

<!-- ═══════════════════════════════════════════════════ SERVICES -->
<section id="services" class="pmb-services pmb-section">
	<div class="pmb-container">
		<div class="pmb-eyebrow pmb-eyebrow--center">What We Do</div>
		<h2 class="pmb-heading pmb-heading--center">Full-Service Plumbing<br>&amp; Mechanical</h2>
		<div class="pmb-services__grid">

			<div class="pmb-svc-card">
				<div class="pmb-svc-card__icon">
					<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="4"/><line x1="12" y1="2" x2="12" y2="8"/><line x1="12" y1="16" x2="12" y2="22"/><line x1="2" y1="12" x2="8" y2="12"/><line x1="16" y1="12" x2="22" y2="12"/></svg>
				</div>
				<h3>Drain Cleaning &amp; Camera</h3>
				<p>Professional diagnosis and clearing of clogs, blockages, and sewage backups using camera inspection equipment.</p>
			</div>

			<div class="pmb-svc-card">
				<div class="pmb-svc-card__icon">
					<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>
				</div>
				<h3>Fixture Repairs &amp; Replacements</h3>
				<p>Faucets, valves, waterstops, tub spouts, toilets, and baseboard systems repaired or replaced right the first time.</p>
			</div>

			<div class="pmb-svc-card">
				<div class="pmb-svc-card__icon">
					<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
				</div>
				<h3>HVAC Services</h3>
				<p>Repairs, maintenance, refrigerant recharging, and minisplit installations to keep your system at peak efficiency.</p>
			</div>

			<div class="pmb-svc-card">
				<div class="pmb-svc-card__icon">
					<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 2c0 6-8 8-8 14a8 8 0 0016 0c0-6-8-8-8-14z"/><path d="M12 12c0 2.5-3 3.5-3 5.5a3 3 0 006 0c0-2-3-3-3-5.5z"/></svg>
				</div>
				<h3>Boiler Services</h3>
				<p>Installation, maintenance, cleaning, and repair covering the complete lifespan of residential and commercial boilers.</p>
			</div>

			<div class="pmb-svc-card">
				<div class="pmb-svc-card__icon">
					<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 2c0 5-5 7-5 12a5 5 0 0010 0c0-5-5-7-5-12z"/><path d="M9 17c0-1.5 3-2.5 3-4s-3-2.5-3-4"/></svg>
				</div>
				<h3>Natural Gas &amp; Propane</h3>
				<p>Safe propane connections for outdoor grills and whole-home natural gas solutions installed to code.</p>
			</div>

			<div class="pmb-svc-card">
				<div class="pmb-svc-card__icon">
					<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
				</div>
				<h3>Water Heater Services</h3>
				<p>Traditional and tankless water heater repairs, maintenance, replacements, and upgrades for every home.</p>
			</div>

		</div>
	</div>
</section>

<!-- ═══════════════════════════════════════════════════ EMERGENCY -->
<section id="emergency" class="pmb-emergency">
	<div class="pmb-container pmb-emergency__layout">
		<div class="pmb-emergency__copy">
			<div class="pmb-eyebrow pmb-eyebrow--light">Always On Call</div>
			<h2 class="pmb-emergency__heading">24/7 Emergency Service</h2>
			<ul class="pmb-emergency__list">
				<li>Water Leaks</li>
				<li>No Heat</li>
				<li>No Hot Water</li>
				<li>No AC</li>
				<li>Frozen Pipes</li>
			</ul>
		</div>
		<div class="pmb-emergency__action">
			<p>Day or night &mdash; we answer the phone.</p>
			<a href="tel:7814848550" class="pmb-btn pmb-btn--orange pmb-btn--lg">
				<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 1.08h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
				CALL NOW
			</a>
		</div>
	</div>
</section>

<!-- ═══════════════════════════════════════════════════ PLAN -->
<section id="maintenance-plan" class="pmb-plan pmb-section pmb-section--light">
	<div class="pmb-container pmb-plan__layout">
		<div class="pmb-plan__intro">
			<div class="pmb-eyebrow">Protect Your Home</div>
			<h2 class="pmb-heading">Yearly Maintenance Plan</h2>
			<p>One affordable plan keeps every major system in your home serviced, prioritized, and protected all year long.</p>
			<a href="#contact" class="pmb-btn pmb-btn--navy pmb-btn--mt">Join the Plan</a>
		</div>
		<div class="pmb-plan__benefits">
			<div class="pmb-plan__item">
				<div class="pmb-plan__check" aria-hidden="true">✓</div>
				<div class="pmb-plan__item-body">
					<strong>Full System Cleaning</strong>
					<span>Water heater, boiler &amp; AC unit serviced annually</span>
				</div>
			</div>
			<div class="pmb-plan__item">
				<div class="pmb-plan__check" aria-hidden="true">✓</div>
				<div class="pmb-plan__item-body">
					<strong>Priority Response</strong>
					<span>Plan members get first-call scheduling, every time</span>
				</div>
			</div>
			<div class="pmb-plan__item">
				<div class="pmb-plan__check" aria-hidden="true">✓</div>
				<div class="pmb-plan__item-body">
					<strong>Discounted Service Calls</strong>
					<span>Members save on every visit throughout the year</span>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ═══════════════════════════════════════════════════ REVIEWS -->
<section id="reviews" class="pmb-reviews pmb-section">
	<div class="pmb-container">
		<div class="pmb-eyebrow pmb-eyebrow--center">Client Reviews</div>
		<h2 class="pmb-heading pmb-heading--center">Trusted Across Greater Boston</h2>
		<div class="pmb-reviews__grid">
			<div class="pmb-review">
				<div class="pmb-review__stars" aria-label="5 stars">★★★★★</div>
				<p>&ldquo;Patrick responded within the hour on a Sunday night when our boiler went out in January. Professional, fast, and honest pricing. Won&rsquo;t use anyone else.&rdquo;</p>
				<div class="pmb-review__attr">&mdash; Google Review</div>
			</div>
			<div class="pmb-review">
				<div class="pmb-review__stars" aria-label="5 stars">★★★★★</div>
				<p>&ldquo;3rd generation master plumber &mdash; it shows. He diagnosed our drain issue in minutes and had it fixed same day. Highly recommend to anyone in the Woburn area.&rdquo;</p>
				<div class="pmb-review__attr">&mdash; Google Review</div>
			</div>
			<div class="pmb-review">
				<div class="pmb-review__stars" aria-label="5 stars">★★★★★</div>
				<p>&ldquo;Installed our new Navien tankless water heater perfectly. Clean work, explained everything clearly, and the price was exactly what he quoted. Five stars without hesitation.&rdquo;</p>
				<div class="pmb-review__attr">&mdash; Google Review</div>
			</div>
		</div>
		<div class="pmb-reviews__cta">
			<a href="https://search.google.com/local/writereview?placeid=ChIJ..." class="pmb-btn pmb-btn--outline" target="_blank" rel="noopener noreferrer">Write a Review</a>
		</div>
	</div>
</section>

<!-- ═══════════════════════════════════════════════════ CONTACT -->
<section id="contact" class="pmb-contact pmb-section--navy">
	<div class="pmb-container pmb-contact__layout">
		<div class="pmb-contact__info">
			<div class="pmb-eyebrow pmb-eyebrow--light">Get In Touch</div>
			<h2 class="pmb-contact__heading">Ready to Help,<br>Around the Clock</h2>
			<ul class="pmb-contact__details">
				<li>
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 1.08h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
					<a href="tel:7814848550">781-484-8550</a>
				</li>
				<li>
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
					<a href="mailto:Pmboisvertplumbing@gmail.com">Pmboisvertplumbing@gmail.com</a>
				</li>
				<li>
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
					Woburn, MA &middot; Serving Greater Boston
				</li>
				<li>
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12,6 12,12 16,14"/></svg>
					Available 24/7, nights &amp; weekends
				</li>
			</ul>
		</div>
		<div class="pmb-contact__form">
			<?php if ( function_exists( 'wpforms_display' ) ) : ?>
				<?php wpforms_display( 1, true, true ); ?>
			<?php else : ?>
			<form class="pmb-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="pmb_contact">
				<?php wp_nonce_field( 'pmb_contact_nonce', 'pmb_nonce' ); ?>
				<div class="pmb-form__row">
					<div class="pmb-form__field">
						<label for="pmb-name">Your Name</label>
						<input type="text" id="pmb-name" name="pmb_name" required>
					</div>
					<div class="pmb-form__field">
						<label for="pmb-phone">Phone Number</label>
						<input type="tel" id="pmb-phone" name="pmb_phone" required>
					</div>
				</div>
				<div class="pmb-form__field">
					<label for="pmb-email">Email Address</label>
					<input type="email" id="pmb-email" name="pmb_email" required>
				</div>
				<div class="pmb-form__field">
					<label for="pmb-service">Service Needed</label>
					<select id="pmb-service" name="pmb_service">
						<option value="">Select a service&hellip;</option>
						<option>Drain Cleaning &amp; Camera</option>
						<option>Fixture Repairs &amp; Replacements</option>
						<option>HVAC Services</option>
						<option>Boiler Services</option>
						<option>Natural Gas &amp; Propane</option>
						<option>Water Heater Services</option>
						<option>Emergency Service</option>
						<option>Maintenance Plan</option>
						<option>Other</option>
					</select>
				</div>
				<div class="pmb-form__field">
					<label for="pmb-message">Message</label>
					<textarea id="pmb-message" name="pmb_message" rows="4" placeholder="Tell us about your project or issue&hellip;"></textarea>
				</div>
				<button type="submit" class="pmb-btn pmb-btn--orange pmb-btn--full">Send Message</button>
			</form>
			<?php endif; ?>
		</div>
	</div>
</section>

</main>

<?php get_footer(); ?>
