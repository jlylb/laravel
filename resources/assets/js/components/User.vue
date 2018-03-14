<template>
<<<<<<< HEAD
<div>
=======
>>>>>>> cb5348e8440f3d4fd8dee111fa0d9575820471bb
    <el-table :data="tableData" style="width: 100%">

      <el-table-column prop="created_at" label="创建日期" width="180"></el-table-column>

      <el-table-column prop="updated_at" label="更新日期" width="180"></el-table-column>

      <el-table-column prop="name" label="姓名" width="180"></el-table-column>

      <el-table-column prop="email" label="邮箱"></el-table-column>

    </el-table>
<<<<<<< HEAD
    
    <el-pagination
      @size-change="handleSizeChange"
      @current-change="handleCurrentChange"
      :current-page="currentPage"
      :page-sizes="[10, 20, 30, 40]"
      :page-size="pagesize"
      layout="total, sizes, pager, jumper"
      :total="totalCount">
    </el-pagination>
</div>    
    
</template>

<script>
export default {
  data() {
    return {
      tableData: [],
      //请求的URL
      url: "/admin/user",
      //默认每页数据量
      pagesize: 10,
      //当前页码
      currentPage: 1,
      //默认数据总数
      totalCount: 0
    };
  },
  mounted: function() {},
  created: function() {
    this.getData();
  },
  methods: {
    getData: function() {
      this.$http
        .get(this.url, {
          params: { page: this.currentPage, per_page: this.pagesize }
        })
        .then(res => {

          this.tableData = res.body.data || [];
          
          this.totalCount = res.body.total;

        });
    },

    //每页显示数据量变更
    handleSizeChange: function(val) {
      this.pagesize = val;
      this.getData();
    },

    //页码变更
    handleCurrentChange: function(val) {
      this.currentPage = val;
      this.getData();
    }
  }
};
=======
</template>

<script>
    export default {
     data() {
        return {
          tableData: [],
          //请求的URL
          url:'newstu/querystudentbypage',
          //搜索条件
          criteria: '',
          //下拉菜单选项
          select: '',
          //默认每页数据量
          pagesize: 10,
          //当前页码
          currentPage: 1,
          //查询的页码
          start: 1,
          //默认数据总数
          totalCount: 1000,
        }
      },
        mounted:function() {
  },
  created:function(){
    this.getData();
  },
  methods:{
    getData:function(){
      this.$http.get('/admin/user').then((res)=>{
        this.tableData=res.body.data||[];
      });
    }
  }
    }
>>>>>>> cb5348e8440f3d4fd8dee111fa0d9575820471bb
</script>
