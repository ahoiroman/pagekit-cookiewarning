<?php $view->script( 'settings', 'cookiewarning:app/bundle/settings.js', [ 'vue', 'input-link' ] ); ?>

<div id="settings" class="uk-form uk-form-horizontal" v-cloak>
	<div class="uk-grid pk-grid-large" data-uk-grid-margin>
		<div class="pk-width-sidebar">
			<div class="uk-panel">
				<ul class="uk-nav uk-nav-side pk-nav-large" data-uk-tab="{ connect: '#tab-content' }">
					<li><a><i class="pk-icon-large-settings uk-margin-right"></i> {{ 'General' | trans }}</a></li>
				</ul>
			</div>
		</div>
		<div class="pk-width-content">
			<ul id="tab-content" class="uk-switcher uk-margin">
				<li>
					<div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
						<div data-uk-margin>
							<h2 class="uk-margin-remove">{{ 'General' | trans }}</h2>
						</div>
						<div data-uk-margin>
							<button class="uk-button uk-button-primary" @click.prevent="save">{{ 'Save' | trans }}
							</button>
						</div>
					</div>
					<div class="uk-form-row">
						<label for="form-position" class="uk-form-label">{{ 'Position' | trans }}</label>
						<div class="uk-form-controls">
							<select id="form-position" class="uk-form-width-large" v-model="config.position">
								<option value="bottom">{{ 'Bottom' | trans }}</option>
								<option value="top">{{ 'Top' | trans }}</option>
								<option value="bottom-left">{{ 'Bottom-Left' | trans }}</option>
								<option value="bottom-right">{{ 'Bottom-Right' | trans }}</option>
							</select>
						</div>
					</div>
					<div class="uk-form-row">
						<label for="form-theme" class="uk-form-label">{{ 'Theme' | trans }}</label>
						<div class="uk-form-controls">
							<select id="form-theme" class="uk-form-width-large" v-model="config.theme">
								<option value="classic">{{ 'Classic' | trans }}</option>
								<option value="block">{{ 'Block' | trans }}</option>
								<option value="edgeless">{{ 'Edgeless' | trans }}</option>
							</select>
						</div>
					</div>
					<div class="uk-form-row">
						<label class="uk-form-label">{{ 'Popup-Background-Colour' | trans }}</label>
						<div class="uk-form-controls uk-form-controls-text">
							<p class="uk-form-controls-condensed">
								<input type="text" class="uk-form-width-large" placeholder="#000000" v-model="config.popup.backgroundcolour">
							</p>
						</div>
					</div>
					<div class="uk-form-row">
						<label class="uk-form-label">{{ 'Popup-Text-Colour' | trans }}</label>
						<div class="uk-form-controls uk-form-controls-text">
							<p class="uk-form-controls-condensed">
								<input type="text" class="uk-form-width-large" placeholder="#000000" v-model="config.popup.textcolour">
							</p>
						</div>
					</div>
					<div class="uk-form-row">
						<label class="uk-form-label">{{ 'Button-Background-Colour' | trans }}</label>
						<div class="uk-form-controls uk-form-controls-text">
							<p class="uk-form-controls-condensed">
								<input type="text" class="uk-form-width-large" placeholder="#000000" v-model="config.button.backgroundcolour">
							</p>
						</div>
					</div>
					<div class="uk-form-row">
						<label class="uk-form-label">{{ 'Button-Text-Colour' | trans }}</label>
						<div class="uk-form-controls uk-form-controls-text">
							<p class="uk-form-controls-condensed">
								<input type="text" class="uk-form-width-large" placeholder="#000000" v-model="config.button.textcolour">
							</p>
						</div>
					</div>
					<div class="uk-form-row">
						<label class="uk-form-label">{{ 'Message' | trans }}</label>
						<div class="uk-form-controls uk-form-controls-text">
							<p class="uk-form-controls-condensed">
								<input type="text" class="uk-form-width-large" placeholder="{{ 'Overwrite message' | trans }}" v-model="config.message">
							</p>
						</div>
					</div>
					<div class="uk-form-row">
						<label class="uk-form-label">{{ 'Dismiss-Button-Text' | trans }}</label>
						<div class="uk-form-controls uk-form-controls-text">
							<p class="uk-form-controls-condensed">
								<input type="text" class="uk-form-width-large" placeholder="{{ 'Overwrite dismiss-button' | trans }}"v-model="config.dismissbuttontext">
							</p>
						</div>
					</div>
					<div class="uk-form-row">
						<label class="uk-form-label">{{ 'Policy URL' | trans }}</label>
						<div class="uk-form-controls uk-form-controls-text">
							<p class="uk-form-controls-condensed">
								<input-link id="form-redirect" class="uk-form-width-large" :link.sync="config.url"></input-link>
							</p>
						</div>
					</div>
					<div class="uk-form-row">
						<label class="uk-form-label">{{ 'Policy-Link-Text' | trans }}</label>
						<div class="uk-form-controls uk-form-controls-text">
							<p class="uk-form-controls-condensed">
								<input type="text" class="uk-form-width-large" placeholder="{{ 'Overwrite Policy-Link-Text' | trans }}" v-model="config.policytext">
							</p>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>