<template>

<div>

  <el-button type="primary" @click="handleOpen">添加</el-button>

 <el-dialog title="添加用户" :visible.sync="dialogFormVisible" center>

  <el-form :model="ruleform1" status-icon :rules="rules" ref="ruleform1">

    <el-form-item label="用户名称" :label-width="formLabelWidth" prop="name">
      <el-input v-model="ruleform1.name" auto-complete="off"></el-input>
    </el-form-item>

    <el-form-item label="用户邮箱" :label-width="formLabelWidth"  prop="email">
      <el-input v-model="ruleform1.email" auto-complete="off"></el-input>
    </el-form-item>

    <el-form-item label="用户密码" :label-width="formLabelWidth" prop="password">
      <el-input type="password" v-model="ruleform1.password" auto-complete="off"></el-input>
    </el-form-item>

    <el-form-item label="确认密码" :label-width="formLabelWidth" prop="passwordCompare">
      <el-input type="password" v-model="ruleform1.passwordCompare" auto-complete="off"></el-input>
    </el-form-item>
    
  </el-form>

  <div slot="footer" class="dialog-footer">
    <el-button @click="dialogFormVisible = false">取 消</el-button>
    <el-button type="primary" @click="submitForm('ruleform1')">确 定</el-button>
  </div>

</el-dialog>

    <el-table 
    :data="tableData" 
    style="width: 100%" 
    @selection-change="handleSelectionChange"
    :default-sort = "{prop: 'created_at', order: 'descending'}">

    <el-table-column type="expand">
      <template slot-scope="props">
        <el-form label-position="left" inline class="demo-table-expand">
          <el-form-item label="创建日期">
            <span>{{ props.row.created_at }}</span>
          </el-form-item>
          <el-form-item label="更新日期">
            <span>{{ props.row.updated_at }}</span>
          </el-form-item>
          <el-form-item label="姓名">
            <span>{{ props.row.name }}</span>
          </el-form-item>
          <el-form-item label="邮箱">
            <span>{{ props.row.email }}</span>
          </el-form-item>
        </el-form>
      </template>
    </el-table-column>

    <el-table-column
      type="selection"
      width="55">
    </el-table-column>
    <el-table-column prop="id" label="编号" sortable></el-table-column>
      <el-table-column prop="created_at" label="创建日期" sortable></el-table-column>

      <el-table-column prop="updated_at" label="更新日期" sortable></el-table-column>

      <el-table-column prop="name" label="姓名" ></el-table-column>

      <el-table-column prop="email" label="邮箱"  sortable></el-table-column>
    <el-table-column
      fixed="right"
      label="操作">
      <template slot-scope="scope">
        <el-button
          size="mini"
          type="success"
          @click="handleEdit(scope.$index, scope.row)">编辑</el-button>
        <el-button
          size="mini"
          type="danger"
          @click="handleDelete(scope.$index, scope.row)">删除</el-button>
      </template>
    </el-table-column>
    </el-table>
    
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
    var validatePass2 = (rule, value, callback) => {
      if (value === "") {
        callback(new Error("请再次输入密码"));
      } else if (value !== this.form.passwordCompare) {
        callback(new Error("两次输入密码不一致!"));
      } else {
        callback();
      }
    };
          var checkAge = (rule, value, callback) => {
        if (!value) {
          return callback(new Error('年龄不能为空'));
        }
        setTimeout(() => {
          if (!Number.isInteger(value)) {
            callback(new Error('请输入数字值'));
          } else {
            if (value < 18) {
              callback(new Error('必须年满18岁'));
            } else {
              callback();
            }
          }
        }, 1000);
      };
      var validatePass = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('请输入密码'));
        } else {
          if (this.ruleForm2.checkPass !== '') {
            this.$refs.ruleForm2.validateField('checkPass');
          }
          callback();
        }
      };
    return {
              ruleForm2: {
          pass: '',
          checkPass: '',
          age: ''
        },
        rules2: {
          pass: [
            { validator: validatePass, trigger: 'blur' }
          ],
          checkPass: [
            { validator: validatePass2, trigger: 'blur' }
          ],
          age: [
            { validator: checkAge, trigger: 'blur' }
          ]
        },
      tableData: [],
      //请求的URL
      url: "/admin/user",
      //默认每页数据量
      pagesize: 10,
      //当前页码
      currentPage: 1,
      //默认数据总数
      totalCount: 0,

      dialogFormVisible: false,

      ruleform1: {
        name: "",
        email: "",
        password: "",
        passwordCompare: ""
      },
      rules: {
        name: [
          { required: true, message: "请输入用户名称", trigger: "blur" },
          { min: 6, max: 30, message: "长度在 6 到 30 个字符", trigger: "blur" }
        ],
        email: [
          {
            type: "email",
            required: true,
            message: "请输入用户邮箱",
            trigger: "blur"
          }
        ],
        password: [
          { required: true, message: "请输入用户密码", trigger: "blur" }
        ],
        passwordCompare: [
          { validator: validatePass2, trigger: "blur" }
        ]
      },
      formLabelWidth: "120px",

      multipleSelection: []
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
    handleEdit(index, row) {
      console.log(index, row); 
      this.dialogFormVisible=true; 
      _.extend(this.ruleform1,row);          
    },
    handleOpen() {
      _.forEach(this.ruleform1, (value, key) =>{
        this.ruleform1[key]='';
      });
      this.dialogFormVisible=true;          
    },
    handleDelete(index, row) {
      console.log(index, row);
      this.$confirm("是否确认删除?", "提示", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        type: "warning"
      })
        .then(() => {
          this.$http
            .delete("/admin/user/" + row.id, {
              emulateJSON: true
            })
            .then(
              function(res) {
                this.getData();
                this.$message({
                  type: "success",
                  message: "删除成功!"
                });
              },
              function() {
                console.log("failed");
              }
            );
        })
        .catch(() => {
          this.$message({
            type: "info",
            message: "已取消删除"
          });
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
    },
    handleSelectionChange(val) {
      this.multipleSelection = val;
    },
    handleClose(done) {
      this.$confirm("确认关闭？")
        .then(_ => {
          done();
        })
        .catch(_ => {});
    },
    submitForm:function(formName) {
      console.log(formName,this.$refs[formName].validate);
      console.log(this.$refs[formName]);return;
      this.$refs[formName].validate(valid => {
        if (valid) {
          alert("submit!");
        } else {
          console.log("error submit!!");
          return false;
        }
      });
    },
    resetForm:function(formName) {
        this.$refs[formName].resetFields();
      }
    
  }
};
</script>
