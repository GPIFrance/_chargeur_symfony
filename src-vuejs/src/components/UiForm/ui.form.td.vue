<template>
	<td v-if="!inEdition"
			v-html="translateBoolean(_item[_key])"
			@dblclick="enterModeEdition"></td>
	<td v-else>
		<div class="ui input" :class="{ 'input loading': onUpdating }">
			<input v-if="isBoolean(_item[_key])"
						 @focusout="updateData"
						 v-model="_item[_key]"
						 type="checkbox"
						 autofocus>
			<input v-else @keyup.esc="leaveModeEdition"
						 @change="updateData"
						 v-model="newValue"
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
				newValue: '',
				lastValue: '',
				onUpdating: false,
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
				this.onUpdating = true;
				this.saveValue();
				this._item[this._key] = this.newValue;
				service.api.updateAddress(this._item).then(() => {
					this.onUpdating = false;
					this.leaveModeEdition();
				}).catch(error => {
					this._item[this._key] = this.getSaveValue();
					this.onUpdating = false;
					this.leaveModeEdition();
					console.error(error);
				});
			},
			enterModeEdition() {
				this.assignNewValue(this._item[this._key]);
				this.inEdition = true;
			},
			leaveModeEdition() {
				this.inEdition = false;
			},
			assignNewValue(value) {
				this.newValue = value;
			},
			saveValue() {
				this.lastValue = this._item[this._key];
			},
			getSaveValue() {
				return this.lastValue;
			},
			isBoolean(value) {
				return typeof value == 'boolean';
			}
		}
	}
</script>