<template>
    <div class="uk-form uk-form-horizontal">
        <h1>{{ 'Cookiewarning Settings' | trans }}</h1>
        <div class="uk-form-row">
            <label for="form-position" class="uk-form-label">{{ 'Position' | trans }}</label>
            <div class="uk-form-controls">
                <select id="form-position" class="uk-form-width-medium" v-model="package.config.position">
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
                <select id="form-theme" class="uk-form-width-medium" v-model="package.config.theme">
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
                    <input type="text" class="uk-form-width-medium" placeholder="#000000" v-model="package.config.popup.backgroundcolour">
                </p>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Popup-Text-Colour' | trans }}</label>
            <div class="uk-form-controls uk-form-controls-text">
                <p class="uk-form-controls-condensed">
                    <input type="text" class="uk-form-width-medium" placeholder="#000000" v-model="package.config.popup.textcolour">
                </p>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Button-Background-Colour' | trans }}</label>
            <div class="uk-form-controls uk-form-controls-text">
                <p class="uk-form-controls-condensed">
                    <input type="text" class="uk-form-width-medium" placeholder="#000000" v-model="package.config.button.backgroundcolour">
                </p>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Button-Text-Colour' | trans }}</label>
            <div class="uk-form-controls uk-form-controls-text">
                <p class="uk-form-controls-condensed">
                    <input type="text" class="uk-form-width-medium" placeholder="#000000" v-model="package.config.button.textcolour">
                </p>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Message' | trans }}</label>
            <div class="uk-form-controls uk-form-controls-text">
                <p class="uk-form-controls-condensed">
                    <input type="text" class="uk-form-width-medium" placeholder="{{ 'Overwrite message' | trans }}" v-model="package.config.message">
                </p>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Dismiss-Button-Text' | trans }}</label>
            <div class="uk-form-controls uk-form-controls-text">
                <p class="uk-form-controls-condensed">
                    <input type="text" class="uk-form-width-medium" placeholder="{{ 'Overwrite dismiss-button' | trans }}"v-model="package.config.dismissbuttontext">
                </p>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Policy URL' | trans }}</label>
            <div class="uk-form-controls uk-form-controls-text">
                <p class="uk-form-controls-condensed">
                    <input-link id="form-redirect" class="uk-form-width-medium" :link.sync="package.config.url"></input-link>
                </p>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Policy-Link-Text' | trans }}</label>
            <div class="uk-form-controls uk-form-controls-text">
                <p class="uk-form-controls-condensed">
                    <input type="text" class="uk-form-width-medium" placeholder="{{ 'Overwrite Policy-Link-Text' | trans }}" v-model="package.config.policytext">
                </p>
            </div>
        </div>
        <div class="uk-form-row uk-margin-top">
            <div class="uk-form-controls">
                <button class="uk-button uk-button-primary" @click="save">{{ 'Save' | trans }}</button>
            </div>
        </div>
    </div>
</template>

<script>

module.exports = {

	settings: true,

	props: ['package'],

	methods: {
		save: function save() {
			this.$http.post ('admin/system/settings/config', {
				name: 'spqr/cookiewarning',
				config: this.package.config
			}).then (function () {
				this.$notify ('Settings saved.', '');
			}).catch (function (response) {
				this.$notify (response.message, 'danger');
			}).finally (function () {
				this.$parent.close ();
			});
		}
	}
};

window.Extensions.components['cookiewarning-settings'] = module.exports;
</script>