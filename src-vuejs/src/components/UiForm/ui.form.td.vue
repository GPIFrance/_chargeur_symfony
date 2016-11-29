<template>
	<td v-if="!inEdition"
			v-html="translateBoolean(_item[_key])"
			@dblclick="switchModeEdition"></td>
	<td v-else>
		<div class="ui input">
			<input v-if="isBoolean(_item[_key])"
						 @focusout="updateData"
						 v-model="_item[_key]"
						 type="checkbox"
						 autofocus>
			<input v-else @keyup.esc="switchModeEdition"
						 @change="updateData"
						 v-model="_item[_key]"
						 type="text"
						 autofocus>
		</div>
	</td>
</template>

<script>
	import service from '../../services';

	export default {
		name: 'UiFormTd',
		props: [
			'_item',
			'_key'
		],
		data() {
			return {
				inEdition: false
			}
		},
		methods: {
			translateBoolean(value) {
				if (typeof value == 'boolean') {
					return value ? 'oui' : 'non';
				}
				return value;
			},
			updateData() {
				service.api.updateAddress(this._item).then(response => {
					if(!response.success){
						console.error(response.message);
					}
					this.switchModeEdition();
				});
			},
			switchModeEdition() {
				this.inEdition = !this.inEdition;
			},
			isBoolean(value) {
				return typeof value == 'boolean';
			}
		}
	}
</script>