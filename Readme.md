

## 可拖拽式待办清单

预览：
![预览](https://raw.githubusercontent.com/prajnaHT/demo/master/preview.jpg)

作用： 这个小DEMO可以用来记录待办清单、删除已完成事项。

特点1：预留两个可拖拽的DIV面板。

特点2：关闭第一个的同时，第二个会自动挪到第一个的位置。关闭只是暂时不可见，刷新页面即可重新显示。

特点3：点击提交后，待办事项会自动存储到关联的 *.json 文件中。并在DIV面板中显示出来。

特点4：*.json中没有记录时，DIV面板上会显示“当前没有待办清单”

特点5：DIV面板中逐条显示待办清单，点击每条清单右侧的删除图标，即可删除当前的待办清单。*.json文件也会同步删除。

### 文件名及其功能

index.php   主页，显示待办清单面板

create_todolist.php  提交清单文本时，服务端做的文件存储处理。

delete.php 删除清单时，服务端做的文件记录查找和删除处理。

data / hyde.json | tetsu.json   分别用于存储两个待办清单数据的json 文件。
