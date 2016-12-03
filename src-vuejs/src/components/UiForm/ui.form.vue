<template>
	<div class="ui basic segment" >
		<div v-if="!charged" class="ui active dimmer" style="height: 300px;">
			<div class="ui text loader">Chargement du tableau ...</div>
		</div>
		<table v-else class="ui table">
			<thead>
			<tr>
				<th v-for="field in addressSchema">{{ field }}</th>
			</tr>
			</thead>
			<tbody>
			<tr v-for="address in addresses">
				<ui-form-td v-for="field in addressSchema" :_item="address" :_key="field"></ui-form-td>
			</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
	import service from '../../services';
	import UiFormTd from './ui.form.td.vue';

	export default {
		name: 'UiForm',
		data() {
			return {
				addresses: null,
				addressSchema: null,
				intervalId: null,
				inEdit: false,
				charged: false
			}
		},
		components: {
			UiFormTd
		},
		created() {
			this.getAddressSchema();
		},
		methods: {
			getFullAddresses(obj) {
				let res = '';
				for (let i = 0; i < 5; i++) {
					if (obj.hasOwnProperty('address' + (i + 1))) {
						res += obj['address' + (i + 1)] + '<br>';
					}
				}
				return res;
			},
			getAddresses() {
				service.api.getAddresses().then(res => {
					this.addresses = res;
					this.charged = true;
				}).catch(err => console.error(err));
			},
			getAddressSchema() {
				service.api.getSchema('address').then(res => {
					this.addressSchema = res
					this.getAddresses();
				}).catch(err => console.error(err));
			},
			translateBoolean(value) {
				if (typeof value == 'boolean') {
					return value ? 'oui' : 'non';
				}
				return value;
			},
			switchModeEdition() {
				this.inEdit = !this.inEdit;
			}
		}
	}
</script>