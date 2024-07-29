import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:get/get_core/src/get_main.dart';
import 'package:new_app/controller/comment_controller.dart';
import 'package:new_app/screen/home/function_comment/delete.dart';

class comment extends StatelessWidget {
  comment({super.key});
  final comment_controller controller = Get.put(comment_controller());
  final data = Get.arguments;
  @override
  Widget build(BuildContext context) {
    return Container(
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.vertical(top: Radius.circular(16)),
      ),
      child: Column(
        mainAxisSize: MainAxisSize.min,
        children: [
          Padding(
            padding:
                const EdgeInsets.only(top: 15, right: 8, left: 8, bottom: 10),
            child: Row(
              children: [
                Text('Comment'),
                Padding(
                  padding: const EdgeInsets.only(left: 100),
                  child: Obx(
                    () => Text('${controller.comments.length} Comment'),
                  ),
                ),
              ],
            ),
          ),
          Divider(),
          Expanded(
            child: Obx(
              () => ListView.builder(
                physics: BouncingScrollPhysics(
                    parent: AlwaysScrollableScrollPhysics()),
                itemCount: controller.comments.length,
                itemBuilder: (context, index) {
                  var comments = controller.comments[index];
                  return Padding(
                    padding: const EdgeInsets.all(1),
                    child: Container(
                      child: Row(
                        children: [
                          Padding(
                            padding: const EdgeInsets.all(5.0),
                            child: CircleAvatar(
                              radius: 30,
                              backgroundImage:
                                  NetworkImage(comments.user.image),
                            ),
                          ),
                          Expanded(
                            child: Container(
                              child: Column(
                                children: [
                                  Padding(
                                    padding: const EdgeInsets.only(
                                        left: 5, top: 5, right: 5),
                                    child: Row(
                                      mainAxisAlignment:
                                          MainAxisAlignment.spaceBetween,
                                      children: [
                                        Text(comments.user.name),
                                        InkWell(
                                          onTap: () {
                                            // print('object');
                                            // if (comments.user_id == data['user']['id']) {
                                              delete_function(comments.user_id,comments.id,data['user']['id']);
                                              print(comments.user_id);
                                              print(data['user']['id']);
                                            //   controller.delete(comments.id);
                                            // }
                                          },
                                          child: Icon(
                                            Icons.more_horiz,
                                          ),
                                        ),
                                      ],
                                    ),
                                  ),
                                  Padding(
                                    padding: const EdgeInsets.only(
                                        left: 5, right: 5),
                                    child: Row(
                                      mainAxisAlignment:
                                          MainAxisAlignment.start,
                                      children: [
                                        Expanded(
                                          child: Text(
                                            comments.comment,
                                            textAlign: TextAlign.start,
                                            style: TextStyle(
                                              color: Colors.black,
                                              fontSize: 12,
                                            ),
                                            maxLines:
                                                2, // Maximum number of lines
                                            overflow: TextOverflow
                                                .ellipsis, // Overflow behavior
                                          ),
                                        ),
                                      ],
                                    ),
                                  ),
                                ],
                              ),
                            ),
                          ),
                        ],
                      ),
                    ),
                  );
                },
              ),
            ),
          ),
          // Text field for adding comments
          Container(
            decoration: BoxDecoration(
              border: Border(
                top: BorderSide(color: Colors.grey.shade400),
              ),
            ),
            height: 60,
            child: Padding(
              padding: const EdgeInsets.all(8.0),
              child: Row(
                children: [
                  Padding(
                    padding: const EdgeInsets.only(right: 5),
                    child: Container(
                      decoration: BoxDecoration(
                        borderRadius: BorderRadius.circular(8),
                      ),
                      height: 60,
                      width: 320,
                      child: TextField(
                        controller: controller.add_comment,
                        decoration: InputDecoration(
                          hintText: 'Add Comment......',
                          prefixIcon: Icon(Icons.send),
                          prefixIconColor: Colors.grey,
                          hintStyle: const TextStyle(
                            fontSize: 14,
                            fontWeight: FontWeight.bold,
                          ),
                          enabledBorder: const OutlineInputBorder(
                            borderSide: BorderSide(color: Colors.transparent),
                          ),
                          // border: InputBorder.none,
                          border: OutlineInputBorder(
                            borderRadius: BorderRadius.circular(8.0),
                          ),
                          focusedBorder: const OutlineInputBorder(
                            borderSide: BorderSide(color: Colors.blue),
                          ),
                          filled: true,
                        ),
                      ),
                    ),
                  ),
                  Expanded(
                    child: Container(
                      width: 100,
                      height: 40,
                      decoration: BoxDecoration(
                        borderRadius: BorderRadius.circular(8),
                        color: Colors.red,
                      ),
                      child: IconButton(
                        onPressed: () {
                          controller.store(
                              controller.id, controller.add_comment.text);
                        },
                        icon: Icon(Icons.send, color: Colors.white, size: 20),
                      ),
                    ),
                  ),
                ],
              ),
            ),
          ),
        ],
      ),
    );
  }
}
