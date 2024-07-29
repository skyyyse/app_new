import 'package:flutter/material.dart';
import 'package:get/get_core/src/get_main.dart';
import 'package:get/get_instance/get_instance.dart';
import 'package:new_app/color/color.dart';
import 'package:new_app/controller/comment_controller.dart';

class delete_comment extends StatefulWidget {
  var comment_user_id,user_id,comment_id;
  delete_comment({super.key,required this.user_id,required this.comment_user_id,required this.comment_id});

  @override
  State<delete_comment> createState() => _delete_commentState();
}

class _delete_commentState extends State<delete_comment> {
  final comment_controller controller = Get.put(comment_controller());

  @override
  Widget build(BuildContext context) {
    return  Container(
      height: 230,
      color: Colors.transparent,
      child: Column(
        children: [
          Padding(
            padding: const EdgeInsets.only(left: 8,right: 8,top: 8),
            child: Container(
              width: double.infinity,
              decoration: BoxDecoration(
                color: Colors.white,
                borderRadius: BorderRadius.circular(10),
              ),
              child: Padding(
                padding: const EdgeInsets.all(8.0),
                child: Column(
                  children: [
                    Padding(
                      padding: const EdgeInsets.only(left: 10,right: 10,top: 5),
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          Text("Report",style: TextStyle(fontSize: 17),),
                          Icon(Icons.arrow_forward_ios_outlined),
                        ],
                      ),
                    ),
                    Padding(
                      padding: const EdgeInsets.only(left: 10,right: 10,top: 10),
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          Text("Copy",style: TextStyle(fontSize: 17),),
                          Icon(Icons.arrow_forward_ios_outlined),
                        ],
                      ),
                    ),
                    Padding(
                      padding: const EdgeInsets.only(left: 10,right: 10,top: 10),
                      child: widget.comment_user_id==widget.user_id?InkWell(
                        onTap: (){
                          setState(() {
                            // print('object');
                            // controller.delete(widget.comment_id);
                            // Navigator.pop(context);
                          });
                        },
                        child: Row(
                          mainAxisAlignment: MainAxisAlignment.spaceBetween,
                          children: [
                            Text("Update",style: TextStyle(fontSize: 17),),
                            Icon(Icons.arrow_forward_ios_outlined),
                          ],
                        ),
                      ):null,
                    ),
                    Padding(
                      padding: const EdgeInsets.only(left: 10,right: 10,top: 10),
                      child: widget.comment_user_id==widget.user_id?InkWell(
                        onTap: (){
                          setState(() {
                            print('object');
                            controller.delete(widget.comment_id);
                            Navigator.pop(context);
                          });
                        },
                        child: Row(
                          mainAxisAlignment: MainAxisAlignment.spaceBetween,
                          children: [
                            Text("Delete",style: TextStyle(fontSize: 17),),
                            Icon(Icons.arrow_forward_ios_outlined),
                          ],
                        ),
                      ):null,
                    ),
                  ],
                ),
              ),
            ),
          ),
          Padding(
            padding: const EdgeInsets.all(8.0),
            child: InkWell(
              onTap: (){
                Navigator.pop(context);
              },
              child: Container(
                width: double.infinity,
                height: 50,
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(10),
                  color: TColor.primary,
                ),
                child: Center(
                    child: Text("Cencel",style: TextStyle(fontSize: 20,color: Colors.white),),
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }
}
