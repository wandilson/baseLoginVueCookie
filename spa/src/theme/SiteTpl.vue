<template>
	<div id="siteTpl">
		<Navbar></Navbar>
		
		<div class="container mt-5">
			<slot></slot>
		</div>
	</div>
</template>

<script>

import Navbar from '@/pages/site/components/Navbar'

export default {
	name: 'siteTpl',
	components: {
		Navbar
	}
}
</script>

<style>

</style>