<template>
	<td v-on:dblclick="switchModeEdition" v-if="!inEdition" v-html="translateBoolean(_item[_var])"></td>
	<td v-else>
		<div class="ui input">
			<input @keyup:enter="switchModeEdition" v-on:focusout="switchModeEdition" type="text" autofocus v-model="_item[_var]">
		</div>
	</td>
</template>

<script>
export default {
	name: 'UiFormTd',
	props: [
			'_item',
			'_var'
	],
	data() {
		return {
			inEdition: false
		}
	},
	methods: {
		translateBoolean(value) {
			if(typeof value == 'boolean') {
				return value ? 'oui' : 'non';
			}
			return value;
		},
		switchModeEdition() {
			this.inEdition = !this.inEdition;
		}
	}
}
</script>