
     

    let app = new Vue({
        el:'#chat_app',
        data:{
            name:'oliber project',
            itemLists:[],
            receive_id:document.getElementById('lander_id').value,
            itemTotal:0,
            userLists:[],
            msgLists:[],
            selectedUser:{},
            rentTotal:0,
            num_page:3,
            pages:null,
            msg_page:1,
            page:1,
            loading:false,
            scrollStatus:true,
            userScroll:true,
        },
        mounted() {
           if(this.receive_id){
             this.getChatUserList(this.receive_id);
           }
           
        },
        watch: {
            
            selectedUser:function(val){
                if(val){
                  this.startGetMessage(val);
                }
            }
          },
        methods:{
            getChatUserList(){
               
               axios.post('/admin/customers/getChatUserList',{'page':this.page,'customer_id':this.receive_id}).then(
                    response=>{
                        
                        if(response.data.status){
                            if(response.data.userlist.length > 0){
                                this.userLists = response.data.userlist;
                                this.selectedUser = this.userLists[0];
                                this.userLists[0].selected = true;
                            }else{
                                this.userScroll = false;
                            }
                           
                        }    
                        
                    }
                )
            },
            openChat(data){
                this.selectedUser = data;
                 this.msg_page = 1;
                 this.scrollStatus=true;
                this.userLists =  this.userLists.filter(function(user){
                     if(user.id == data.id){
                        user.selected = true;
                     }else{
                        user.selected = false;
                     }
                     return user;
                 });
            },
            startGetMessage(user){
                this.loading= true;
                this.msg_page = 1;
                axios.post('/admin/customers/getChatMsgList',{'page':this.msg_page,'user_id':user.id,'receive_id':this.receive_id}).then(
                     response=>{
                        
                        if(response.data.status){
                            var sorted = _.sortBy(response.data.msglist, function(e) {
                                return new Date(e.created_at);
                              });
                           this.msgLists = sorted;
                           
                           
                        }    
                        this.loading=false;
                    }
                )
            },
            getImg(msg){
                var img = JSON.parse(msg);
                var baseUrl = window.location.origin;
                return baseUrl+'/storage/attachments/'+img.new_name;
            },
            getDate(date){
                return moment(date).fromNow();
            },
            scrollToBottom(){
                console.log('done down here');
                const chatLogDiv = document.getElementById('msg_body');
                chatLogDiv.scrollTop = chatLogDiv.scrollHeight;
                console.log(chatLogDiv.scrollTop);
              },
            onScrollHandel(){
                const chatLogDiv = document.getElementById('msg_body');
                var el = document.getElementById("mess_loading");
                this.sticky(el);
                if(chatLogDiv.scrollTop == 0){
                
                    if(this.scrollStatus){
                        this.loading= true;
                        this.getMessage(this.chatInfo);
                       
                    }
                    
                }
            },
            getMessage(){
                this.loading=true;
                this.msg_page = this.msg_page + 1;
                axios.post('/admin/customers/getChatMsgList',{'page':this.msg_page,'user_id':this.selectedUser.id,'receive_id':this.receive_id}).then(async (response)=>{
                        
                    if(response.data.status){
                        if(response.data.msglist.length > 0){
                            var sorted = _.sortBy(response.data.msglist, function(e) {
                                return new Date(e.created_at);
                              });
                            let topscroll = document.getElementById('msg_body').scrollTop;
                            let scrollHeight = document.getElementById('msg_body').scrollHeight;
                            this.previousScrollHeight = scrollHeight - topscroll;
                            await this.msgLists.unshift(...sorted);

                            var nextscrollHeight = document.getElementById('msg_body').scrollHeight;
                            document.getElementById('msg_body').scrollTop =
                            nextscrollHeight - this.previousScrollHeight;
                            
                           this.loading=false;
                        }else{
                            this.scrollStatus = true;
                            this.loading=false;
                        }
                    }    
                        
                }
                )
            },
            sticky( _el ){
                // console.log(_el);
                _el.parentElement.addEventListener("scroll", function(){
                    var parentElementHeight = this.clientHeight;
                    const element = $('#msg_body').position();
                    let x = element.left;
                    _el.style.width = this.clientWidth + "px";
                    _el.style.left = x + "px";
                });
            },
            getUserList(){
                this.page += 1;
                axios.post('/admin/customers/getChatUserList',{'page':this.page,'customer_id':this.receive_id}).then(
                     response=>{
                         
                         if(response.data.status){
                            if(response.data.userlist.length > 0){
                                let self = this;
                                response.data.userlist.map(function(value, key) {
                                    self.userLists.push(value);
                                  });
                                 
                            }else{
                                 this.userScroll = false;
                            }
                            
                         }    
                         
                     }
                 )
             },
            onScrollUser(){
               
                const container = document.getElementById('user_lists');
                const scrolHeight = container.scrollTop + container.clientHeight;
               
                if(container.scrollHeight == parseInt(scrolHeight)){
                    
                    if(this.userScroll){
                        
                        this.getUserList();
                       
                    }
                    
                }
            }
        }
    });