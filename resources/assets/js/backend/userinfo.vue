<template>
	<div class="main-panel">
		<el-breadcrumb separator="/" class="breadcrumb mb25">
			<el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
			<el-breadcrumb-item :to="{ path: '/users' }">用户管理</el-breadcrumb-item>
			<el-breadcrumb-item>用户详情</el-breadcrumb-item>
		</el-breadcrumb>
		<div class="main-content">
			<h3>用户名：{{userinfo.name}}</h3>
            <p>邮箱：{{userinfo.email}}</p>
		</div>
	</div>
</template>
<script>
	import { mapState } from 'vuex'
	export default {
		computed: {
			...mapState(['userinfo', 'user'])
		},

		created(){
			this.$store.dispatch('getUserDetail', {
				id: this.$route.params.id || this.user.id
			})
		}
	}
</script>
<style lang="scss">
	.table-align-center {
		td, th{
			text-align: center;
		}
		th {
			white-space: nowrap;
		}
	}
	.item-icon {
		img {
			width: 40px;
		}
	}
	.avatar-uploader {
		font-size: 0;
		color: #8c939d;
		width: 78px;
		height: 78px;
		line-height: 76px;
		text-align: center;
		border: 1px solid #ebebeb;
		border-radius: 3px;
		transition: .2s;
		img {
			width: 100%;
			height: 100%;
		}
		&:hover {
			border-color: #409eff;
		}
		i {
			font-size: 28px;
			line-height: 76px;
		}
	}
</style>