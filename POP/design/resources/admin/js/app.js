window.ElementUI = require("element-ui");

window.$ = require("jquery");

window.Vue = require("vue");

Vue.use(ElementUI);

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

window.App = new Vue({
    el: "#app",
    components: {
        TinymceEditor: require("@tinymce/tinymce-vue").default
    },
    data() {
        const params = this.getLocationParameter();
        const validatePass = (rule, value, callback) => {
            if (value === "") {
                callback(new Error());
            } else if (value !== this.usersDetailForm.password) {
                callback(new Error());
            } else {
                callback();
            }
        };
        return {
            // 公共
            params: params,
            isCollapse: false,
            pathNames: window.location.pathname
                .replace(/(^\/*|\/*$)/g, "")
                .split("/"),
            // 广告
            adPositionList: [
                {
                    id: 1,
                    name: "首页顶部广告"
                },
                {
                    id: 2,
                    name: "品牌活动顶部广告"
                },
                {
                    id: 3,
                    name: "官方资讯顶部广告"
                },
                {
                    id: 4,
                    name: "关于设界顶部广告"
                }
            ],
            adStatusList: [
                {
                    id: 0,
                    name: "全部"
                },
                {
                    id: 1,
                    name: "有效"
                },
                {
                    id: 2,
                    name: "失效"
                }
            ],
            adListForm: {
                position: Number(params.position) || "",
                ad_status: Number(params.ad_status) || "",
                start_end_at: [params.start_time || "", params.end_time || ""]
                // start_time: params.start_time || '',
                // end_time: params.end_time || '',
            },
            adDetailForm: {
                position: "",
                weight: "",
                title: "",
                subtitle: "",
                description: "",
                link: "",
                up_line_at: "",
                down_line_at: "",
                img_src: "",
                loading: false
            },
            adDetailFormRules: {
                position: [
                    {
                        required: true,
                        message: "请选择广告位",
                        trigger: "change"
                    }
                ],
                weight: [
                    {
                        required: true,
                        message: "请输入广告权重",
                        trigger: "blur"
                    }
                ],
                up_line_at: [
                    {
                        required: true,
                        message: "请选择上线时间",
                        trigger: "change"
                    }
                ],
                img_src: [
                    {
                        required: true,
                        message: "请选择图片上传",
                        trigger: "change"
                    }
                ]
            },
            // 活动
            newsStatusList: [
                {
                    id: 0,
                    name: "全部"
                },
                {
                    id: 1,
                    name: "已上线"
                },
                {
                    id: 2,
                    name: "已下线"
                }
            ],
            newsTypeList: [
                {
                    id: 1,
                    name: "活动"
                },
                {
                    id: 2,
                    name: "资讯"
                }
            ],
            newsTitleList: [
                {
                    id: 1,
                    name: "设界官方"
                },
                {
                    id: 2,
                    name: "非设界官方"
                }
            ],
            newsDesignList: [
                {
                    id: 1,
                    name: "盛泽"
                },
                {
                    id: 2,
                    name: "桐乡"
                },
                {
                    id: 3,
                    name: "广州"
                },
                {
                    id: 4,
                    name: "南通"
                },
                {
                    id: 5,
                    name: "绍兴"
                },
                {
                    id: 6,
                    name: "上海"
                },
                {
                    id: 7,
                    name: "杭州"
                },
                {
                    id: 8,
                    name: "西塘"
                }
            ],
            newsListForm: {
                type: Number(params.type) || "",
                status: Number(params.status) || "",
                start_end_at: [params.start_time || "", params.end_time || ""]
                // start_time: params.start_time || '',
                // end_time: params.end_time || '',
            },
            newsDetailForm: {
                type: "",
                title: "",
                description: "",
                activity_type: "",
                design_world: "",
                venue: "",
                begin_end_at: [],
                // begin_at: '',
                // end_at: '',
                up_line_at: "",
                down_line_at: "",
                img_src: "",
                qr_code_title: "",
                qr_code_images: "",
                content: "",
                loading: false
            },
            newsDetailFormRules: {
                type: [
                    { required: true, message: "请选择分类", trigger: "change" }
                ],
                title: [
                    {
                        required: true,
                        message: "请输入标题",
                        trigger: "blur"
                    }
                ],
                up_line_at: [
                    {
                        required: true,
                        message: "请选择上线时间",
                        trigger: "change"
                    }
                ],
                img_src: [
                    {
                        required: true,
                        message: "请选择图片上传",
                        trigger: "change"
                    }
                ],
                content: [
                    {
                        required: true,
                        message: "请填写正文",
                        trigger: "blur"
                    }
                ]
            },
            newsDetailFormRules0: {
                type: [
                    { required: true, message: "请选择分类", trigger: "change" }
                ],
                title: [
                    {
                        required: true,
                        message: "请输入标题",
                        trigger: "blur"
                    }
                ],
                up_line_at: [
                    {
                        required: true,
                        message: "请选择上线时间",
                        trigger: "change"
                    }
                ],
                img_src: [
                    {
                        required: true,
                        message: "请选择图片上传",
                        trigger: "change"
                    }
                ],
                content: [
                    {
                        required: true,
                        message: "请填写正文",
                        trigger: "blur"
                    }
                ]
            },
            newsDetailFormRules1: {
                type: [
                    { required: true, message: "请选择分类", trigger: "change" }
                ],
                title: [
                    {
                        required: true,
                        message: "请输入标题",
                        trigger: "blur"
                    }
                ],
                design_world: [
                    {
                        required: true,
                        message: "请选择所属设界",
                        trigger: "change"
                    }
                ],
                venue: [
                    {
                        required: true,
                        message: "请输入活动地点",
                        trigger: "blur"
                    }
                ],
                begin_end_at: [
                    {
                        required: true,
                        message: "请选择活动有效期",
                        trigger: "change"
                    }
                ],
                up_line_at: [
                    {
                        required: true,
                        message: "请选择上线时间",
                        trigger: "change"
                    }
                ],
                img_src: [
                    {
                        required: true,
                        message: "请选择图片上传",
                        trigger: "change"
                    }
                ],
                content: [
                    {
                        required: true,
                        message: "请填写正文",
                        trigger: "blur"
                    }
                ]
            },
            newsDetailFormRules2: {
                type: [
                    { required: true, message: "请选择分类", trigger: "change" }
                ],
                title: [
                    {
                        required: true,
                        message: "请输入标题",
                        trigger: "blur"
                    }
                ],
                description: [
                    {
                        required: true,
                        message: "请输入描述",
                        trigger: "blur"
                    }
                ],
                up_line_at: [
                    {
                        required: true,
                        message: "请选择上线时间",
                        trigger: "change"
                    }
                ],
                img_src: [
                    {
                        required: true,
                        message: "请选择图片上传",
                        trigger: "change"
                    }
                ],
                content: [
                    {
                        required: true,
                        message: "请填写正文",
                        trigger: "blur"
                    }
                ]
            },
            // 富文本
            tinymceConfig: {
                tinymceScriptSrc: "/tinymce/tinymce.min.js",
                base_url: '/tinymce',
                document_base_url : "/",
                language: "zh_CN",
                language_url: "/tinymce/langs/zh_CN.js",
                // skin_url: '/tinymce/skins/ui/oxide',
                // theme_url: '/tinymce/themes/silver/theme.min.js',
                // icons_url: '/tinymce/icons/default',
                height: 600,
                menubar: false,
                branding: false,
                relative_urls : false,
                // images_upload_url: "/upload/",
                // images_upload_base_path: "/",
                // images_upload_credentials: true,
                plugins:
                    "link lists image code table wordcount charmap hr paste autoresize",
                toolbar:
                    "bold italic underline strikethrough hr | formatselect fontsizeselect fontselect | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent blockquote indent2em | removeformat code charmap | link unlink image | undo redo",
                // autoresize
                min_height: 200,
                max_height: 750,
                autoresize_on_init: true,
                autoresize_bottom_margin: 0,
                // autoresize_overflow_padding: 20,
                // CONFIG
                forced_root_block: "p",
                force_p_newlines: true,
                importcss_append: true,
                // CONFIG: ContentStyle 这块很重要， 在最后呈现的页面也要写入这个基本样式保证前后一致， `table`和`img`的问题基本就靠这个来填坑了
                content_style: `
                    *                         { padding:0; margin:0; }
                    html, body                { height:100%; }
                    img                       { max-width:100%; display:block;height:auto; }
                    a                         { text-decoration: none; }
                    iframe                    { width: 100%; }
                    p                         { line-height:1.6; margin: 0px; }
                    table                     { word-wrap:break-word; word-break:break-all; max-width:100%; border:none; border-color:#999; }
                    .mce-object-iframe        { width:100%; box-sizing:border-box; margin:0; padding:0; }
                    ul,ol                     { list-style-position:inside; }
                `,
                // CONFIG: Paste
                paste_retain_style_properties: "all",
                paste_word_valid_elements: "*[*]", // word需要它
                paste_data_images: true, // 粘贴的同时能把内容里的图片自动上传，非常强力的功能
                paste_convert_word_fake_lists: false, // 插入word文档需要该属性
                paste_webkit_styles: "all",
                paste_merge_formats: true,
                nonbreaking_force_tab: false,
                paste_auto_cleanup_on_paste: false,
                // CONFIG: Font
                fontsize_formats:
                    "12px 14px 16px 18px 20px 24px 28px 30px 32px 36px 40px",
                // CONFIG: StyleSelect
                style_formats: [
                    {
                        title: "首行缩进",
                        block: "p",
                        styles: { "text-indent": "2em" }
                    },
                    {
                        title: "行高",
                        items: [
                            {
                                title: "1",
                                styles: { "line-height": "1" },
                                inline: "span"
                            },
                            {
                                title: "1.5",
                                styles: { "line-height": "1.5" },
                                inline: "span"
                            },
                            {
                                title: "2",
                                styles: { "line-height": "2" },
                                inline: "span"
                            },
                            {
                                title: "2.5",
                                styles: { "line-height": "2.5" },
                                inline: "span"
                            },
                            {
                                title: "3",
                                styles: { "line-height": "3" },
                                inline: "span"
                            }
                        ]
                    }
                ],
                // FontSelect
                font_formats: `
                    系统字体=Microsoft YaHei,SimHei,Lucida Grande,Lucida Sans Unicode, Helvetica, Arial, Verdana, sans-serif;
                    微软雅黑=微软雅黑,Microsoft YaHei;
                    宋体=宋体;
                    黑体=黑体;
                    仿宋=仿宋;
                    楷体=楷体;
                    隶书=隶书;
                    幼圆=幼圆;
                    Andale Mono=andale mono,times;
                    Arial=arial, helvetica,
                    sans-serif;
                    Arial Black=arial black, avant garde;
                    Book Antiqua=book antiqua,palatino;
                    Comic Sans MS=comic sans ms,sans-serif;
                    Courier New=courier new,courier;
                    Georgia=georgia,palatino;
                    Helvetica=helvetica;
                    Impact=impact,chicago;
                    Symbol=symbol;
                    Tahoma=tahoma,arial,helvetica,sans-serif;
                    Terminal=terminal,monaco;
                    Times New Roman=times new roman,times;
                    Trebuchet MS=trebuchet ms,geneva;
                    Verdana=verdana,geneva;
                    Webdings=webdings;
                    Wingdings=wingdings,zapf dingbats`,
                // Tab
                tabfocus_elements: ":prev,:next",
                object_resizing: true,
                // Image
                imagetools_toolbar:
                    "rotateleft rotateright | flipv fliph | editimage imageoptions",
                images_upload_handler: (blobInfo, success, failure) => {
                    var formData = new FormData();
                    formData.append("img", blobInfo.blob());
                    $.ajax({
                        url: "/upload",
                        type: "post",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(res) {
                            if (res.code === 0) {
                                success(res.data.path);
                            } else {
                                failure(res.msg);
                            }
                        },
                        error: function() {
                            failure("上传失败！");
                        }
                    });
                },
                paste_preprocess: (pl, o) => {
                    const $stripTags = (str, allowed_tags) => {
                        let key = '', allowed = false
                        let matches = []
                        let allowed_array = []
                        let allowed_tag = ''
                        let i = 0
                        let k = ''
                        let html = ''
                        let replacer = function (search, replace, str) {
                            return str.split(search).join(replace)
                        }
                        // Build allowes tags associative array
                        if (allowed_tags) {
                            allowed_array = allowed_tags.match(/([a-zA-Z0-9]+)/gi)
                        }
                        str += ''
                        // Match tags
                        matches = str.match(/(<\/?[\S][^>]*>)/gi)
                        // Go through all HTML tags
                        for (key in matches) {
                            if (isNaN(key)) {
                                // IE7 Hack
                                continue
                            }

                            // Save HTML tag
                            html = matches[key].toString()
                            // Is tag not in allowed list? Remove from str!
                            allowed = false

                            // Go through all allowed tags
                            for (k in allowed_array) {            // Init
                                allowed_tag = allowed_array[k]
                                i = -1

                                if (i != 0) {
                                    i = html.toLowerCase().indexOf('<' + allowed_tag + '>')
                                }
                                if (i != 0) {
                                    i = html.toLowerCase().indexOf('<' + allowed_tag + ' ')
                                }
                                if (i != 0) {
                                    i = html.toLowerCase().indexOf('</' + allowed_tag)
                                }

                                // Determine
                                if (i == 0) {
                                    allowed = true
                                    break
                                }
                            }
                            if (!allowed) {
                                str = replacer(html, "", str) // Custom replace. No regexing
                            }
                        }
                        return str
                    }
                    o.content = $stripTags(o.content, "sup,sub");
                },
            },
            // 用户
            usersListForm: {
                id: params.id || "",
                name: params.name || "",
                phone: params.phone || "",
                email: params.email || "",
                role_id: Number(params.role_id) || "",
                is_able: Number(params.is_able) || ""
            },
            usersDetailForm: {
                name: "",
                email: "",
                phone: "",
                password: "",
                repassword: "",
                role_data:[],
                loading: false
            },
            usersDetailFormRules: {
                name: [
                    { required: true, message: "请输入用户名", trigger: "blur" }
                ],
                phone: [
                    {
                        required: true,
                        message: "请输入联系方式",
                        trigger: "blur"
                    },
                    {
                        pattern: /^0{0,1}(1[0-9][0-9])[0-9]{8}$/,
                        message: "请输入正确的联系方式",
                        trigger: ["blur", "change"]
                    }
                ],
                password: [
                    { required: true, message: "请输入密码", trigger: "blur" }
                ],
                repassword: [
                    {
                        required: true,
                        message: "请再次输入密码",
                        trigger: "blur"
                    },
                    {
                        validator: validatePass,
                        message: "两次输入密码不一致",
                        trigger: ["blur", "change"]
                    }
                ]
            },
            // 角色
            IsAbleList: [{
                id: 1,
                name: "启用"
            },{
                id: 2,
                name: "禁用"
            }],
            rolesListForm: {
                id: params.id || "",
                name: params.name || "",
                display_name: params.display_name || "",
                is_able: Number(params.is_able) || ""
            },
            rolesDetailForm: {
                name: "",
                display_name: "",
                permissions: [],
                permission_ids: [],
                loading: false
            },
            rolesDetailFormRules: {
                name: [
                    { required: true, message: "请输入角色名", trigger: "blur" }
                ],
                display_name: [
                    {
                        required: true,
                        message: "请输入角色描述",
                        trigger: "blur"
                    }
                ],
            },

            operatelogListForm: {
                id: params.id || "",
                name: params.name || "",
                start_end_at: [params.start_time || "", params.end_time || ""]
                // start_time: params.start_time || '',
                // end_time: params.end_time || '',
            },

            defaultProps: {
                children: 'children',
                label: 'display_name'
            },
            roleProps: {
                children: 'children',
                label: 'name'
            },
            checkStrictly: false,
        };
    },
    mounted() {
        if (this.pathNames.indexOf("create") != -1 && this.params.id) {
            this.getDetail();
        }
    },
    methods: {
        checkTree(data, checked) {
            this.rolesDetailForm.permissions = checked.checkedKeys;
        },
        checkRoleTree(data, checked) {
            this.usersDetailForm.role_data = checked.checkedKeys;
        },
        setCheckedKeys(data) {
            this.$refs.tree.setCheckedKeys(data);
        },
        onSearch(list) {
            this.searchUp(list, { page: 1 });
        },
        onAdd() {
            window.location.href = "/" + this.pathNames[0] + "/create";
        },
        onDel(index, row) {
            this.$confirm("此操作将删除该条数据, 是否继续?", "提示", {
                confirmButtonText: "确定",
                cancelButtonText: "取消",
                type: "warning"
            })
                .then(() => {
                    console.log("/" + this.pathNames[0] + "/" + row.id);
                    $.ajax({
                        url: "/" + this.pathNames[0] + "/" + row.id,
                        type: "post",
                        data: {
                            _method: "DELETE"
                        },
                        success: res => {
                            console.log(res);
                            if (res.code === 0) {
                                this.$message({
                                    type: "success",
                                    message: "删除成功!"
                                });
                                window.location.reload();
                            }
                        },
                        error: () => {
                            this.$message.error('删除失败');
                        }
                    });
                })
                .catch(() => {
                    this.$message({
                        type: "info",
                        message: "已取消删除"
                    });
                });
        },
        onEdit(index, row) {
            window.location.href =
                "/" + this.pathNames[0] + "/create?id=" + row.id;
        },
        onAbleDisable(index, row) {
            this.usersDetailForm.loading = true;
            this.rolesDetailForm.loading = true;
            let data = {};
            data.id = row.id;
            $.ajax({
                url: "/" + this.pathNames[0] + "/ableDisable",
                type: "post",
                data: data,
                success: res => {
                    if (res.code === 0) {
                        // window.location.href = "/" + this.pathNames[0];
                        // this.onBack();
                        this.$message({
                            type: "success",
                            message: "操作成功!"
                        });
                    } else {
                        this.$message.error(res.msg);
                        this.usersDetailForm.loading = false;
                        this.rolesDetailForm.loading = false;
                        this.onBack();
                    }
                },
                error: (err) => {
                    this.$message.error(err.message);
                    this.usersDetailForm.loading = false;
                    this.rolesDetailForm.loading = false;
                    this.onBack();
                }
            });
        },
        handleCurrentChange(list, val) {
            this.searchUp(list, { page: val });
        },
        typeChange() {
            this.newsDetailFormRules = this['newsDetailFormRules' + (this.newsDetailForm.type || 0)];
        },
        getDetail() {
            this.adDetailForm.loading = true;
            this.newsDetailForm.loading = true;
            this.usersDetailForm.loading = true;
            this.rolesDetailForm.loading = true;
            $.ajax({
                url: "/" + this.pathNames[0] + "/" + this.params.id,
                type: "get",
                success: res => {
                    if (res.code === 0) {
                        if (this.pathNames[0] === "ad") {
                            this.adDetailForm = Object.assign(
                                this.adDetailForm,
                                res.data
                            );
                        } else if (this.pathNames[0] === "news") {
                            Object.assign(this.newsDetailForm, res.data);
                            if (
                                this.newsDetailForm.begin_at &&
                                this.newsDetailForm.end_at
                            ) {
                                this.$set(this.newsDetailForm, "begin_end_at", [
                                    this.newsDetailForm.begin_at,
                                    this.newsDetailForm.end_at
                                ]);
                            }
                            this.typeChange();
                            // if (this.newsDetailForm.content) {
                            //     this.newsDetailForm.content = this.htmlDecode(
                            //         this.newsDetailForm.content
                            //     );
                            // }
                        } else if (this.pathNames[0] === "users") {
                            this.usersDetailForm = Object.assign(
                                this.usersDetailForm,
                                res.data
                            );
                            this.usersDetailForm.role_data = res.role_ids;
                            this.setCheckedKeys(res.role_ids);
                        } else if (this.pathNames[0] === "roles") {
                            this.rolesDetailForm = Object.assign(
                                this.rolesDetailForm,
                                res.data
                            );
                            this.rolesDetailForm.permissions = res.permission_ids;
                            this.setCheckedKeys(res.permission_ids);
                        }
                        this.adDetailForm.loading = false;
                        this.newsDetailForm.loading = false;
                        this.usersDetailForm.loading = false;
                        this.rolesDetailForm.loading = false;
                    } else {
                        this.$message.error("详情数据获取失败");
                    }
                },
                error: () => {
                    this.$message.error("详情数据获取失败");
                }
            });
        },

        adUploaderSuccess(res, file) {
            if (res.code === 0) {
                this.adDetailForm.img_src = res.data.path;
            } else {
                this.$message.error(res.msg);
            }
        },
        newsUploaderSuccess(res, file) {
            if (res.code === 0) {
                this.newsDetailForm.img_src = res.data.path;
            } else {
                this.$message.error(res.msg);
            }
        },
        qrcodeUploaderSuccess(res, file) {
            if (res.code === 0) {
                this.newsDetailForm.qr_code_images = res.data.path;
            } else {
                this.$message.error(res.msg);
            }
        },

        onBack() {
            // window.history.back();
            location = document.referrer;
        },
        onConfirm(formName) {
            this.$refs[formName].validate(valid => {
                if (valid) {
                    console.log(this.params.id)
                    let data = {};
                    if (this.params.id) {
                        data.id = this.params.id;
                    }
                    if (this.pathNames[0] === "ad") {
                        Object.assign(data, {
                            position: this.adDetailForm.position,
                            weight: this.adDetailForm.weight,
                            title: this.adDetailForm.title,
                            subtitle: this.adDetailForm.subtitle,
                            description: this.adDetailForm.description,
                            link: this.adDetailForm.link,
                            up_line_at: this.adDetailForm.up_line_at,
                            down_line_at: this.adDetailForm.down_line_at,
                            img_src: this.adDetailForm.img_src
                        });
                        this.adDetailForm.loading = true;
                    } else if (this.pathNames[0] === "news") {
                        if (this.newsDetailForm.type == 1) {
                            Object.assign(data, {
                                type: this.newsDetailForm.type,
                                activity_type: this.newsDetailForm.activity_type,
                                title: this.newsDetailForm.title,
                                design_world: this.newsDetailForm.design_world,
                                venue: this.newsDetailForm.venue,
                                begin_at: this.newsDetailForm.begin_end_at[0] || "",
                                end_at: this.newsDetailForm.begin_end_at[1] || "",
                                up_line_at: this.newsDetailForm.up_line_at,
                                down_line_at: this.newsDetailForm.down_line_at,
                                img_src: this.newsDetailForm.img_src,
                                qr_code_title: this.newsDetailForm.qr_code_title,
                                qr_code_images: this.newsDetailForm.qr_code_images,
                                content: this.newsDetailForm.content
                            });
                        } else if (this.newsDetailForm.type == 2) {
                            Object.assign(data, {
                                type: this.newsDetailForm.type,
                                title: this.newsDetailForm.title,
                                description: this.newsDetailForm.description,
                                up_line_at: this.newsDetailForm.up_line_at,
                                down_line_at: this.newsDetailForm.down_line_at,
                                img_src: this.newsDetailForm.img_src,
                                qr_code_title: this.newsDetailForm.qr_code_title,
                                qr_code_images: this.newsDetailForm.qr_code_images,
                                content: this.newsDetailForm.content
                            });
                        }
                        this.newsDetailForm.loading = true;
                    } else if (this.pathNames[0] === "users") {
                        Object.assign(data, {
                            name: this.usersDetailForm.name,
                            phone: this.usersDetailForm.phone,
                            password: this.usersDetailForm.password,
                            role_data: this.usersDetailForm.role_data,
                        });
                        this.usersDetailForm.loading = true;
                    } else if (this.pathNames[0] === "roles") {
                        Object.assign(data, {
                            name: this.rolesDetailForm.name,
                            display_name: this.rolesDetailForm.display_name,
                            permissions: this.rolesDetailForm.permissions,
                        });
                        this.rolesDetailForm.loading = true;
                    }
                    $.ajax({
                        url: "/" + this.pathNames[0],
                        type: "post",
                        data: data,
                        success: res => {
                            if (res.code === 0) {
                                // window.location.href = "/" + this.pathNames[0];
                                this.onBack();
                            } else {
                                this.$message.error(res.msg);
                                this.adDetailForm.loading = false;
                                this.newsDetailForm.loading = false;
                                this.usersDetailForm.loading = false;
                                this.rolesDetailForm.loading = false;
                            }
                        },
                        error: (err) => {
                            this.$message.error(err.message);
                            this.adDetailForm.loading = false;
                            this.newsDetailForm.loading = false;
                            this.usersDetailForm.loading = false;
                            this.rolesDetailForm.loading = false;
                        }
                    });
                } else {
                    console.log("error submit!!");
                    return false;
                }
            });
        },

        htmlDecode(text) {
            //1.首先动态创建一个容器标签元素，如DIV
            var temp = document.createElement("div");
            //2.然后将要转换的字符串设置为这个元素的innerHTML(ie，火狐，google都支持)
            temp.innerHTML = text;
            //3.最后返回这个元素的innerText(ie支持)或者textContent(火狐，google支持)，即得到经过HTML解码的字符串了。
            var output = temp.innerText || temp.textContent;
            temp = null;
            return output;
        },
        formatterPosition(row, column, cellValue, index) {
            for (let i = 0; i < this.adPositionList.length; i++) {
                if (this.adPositionList[i].id == cellValue) {
                    return this.adPositionList[i].name;
                }
            }
        },
        formatterType(row, column, cellValue, index) {
            for (let i = 0; i < this.newsTypeList.length; i++) {
                if (this.newsTypeList[i].id == cellValue) {
                    return this.newsTypeList[i].name;
                }
            }
        },
        searchUp(list, params) {
            let searchAll = Object.assign({}, this.params, params || {});
            let search = "";
            let data = list;
            for (let i in data) {
                if (i === "start_end_at") {
                    data[i] &&
                        data[i][0] &&
                        (search += "&start_time=" + data[i][0]);
                    data[i] &&
                        data[i][1] &&
                        (search += "&end_time=" + data[i][1]);
                    searchAll.start_time = undefined;
                    searchAll.end_time = undefined;
                } else {
                    data[i] && (search += "&" + i + "=" + data[i]);
                    for (let j in searchAll) {
                        if (i === j) {
                            searchAll[j] = undefined;
                        }
                    }
                }
            }
            for (let i in searchAll) {
                searchAll[i] && (search += "&" + i + "=" + searchAll[i]);
            }
            window.location.search = search.replace(/^&/, "?");
        },
        getLocationParameter() {
            let data = {};
            const parameter =
                window.location.search.length > 0
                    ? window.location.search.substring(1)
                    : 0;
            if (parameter != 0) {
                const arg = parameter.split("&");
                for (let i = 0; i < arg.length; i++) {
                    const name = decodeURIComponent(arg[i].split("=")[0]);
                    const value = decodeURIComponent(arg[i].split("=")[1]);
                    data[name] = value;
                }
            }
            return data;
        }
    }
});
