import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/widgets.dart';
import 'package:get/get.dart';
import 'package:get/get_core/src/get_main.dart';
import 'package:get/get_navigation/get_navigation.dart';
import 'package:http/http.dart';
import 'package:new_app/controller/comment_controller.dart';
import 'package:new_app/controller/favorite_controller.dart';
import 'package:new_app/controller/like_controller.dart';
import 'package:new_app/controller/post_controller.dart';
import 'package:new_app/screen/home/comment.dart';
import 'package:new_app/screen/home/appbar.dart';
import 'package:new_app/screen/home/drawer.dart';
import 'package:new_app/screen/home/function_comment/store.dart';
import 'package:new_app/screen/review_new.dart';
import 'package:new_app/screen/review_screen.dart';
import 'package:new_app/screen/test.dart';

class home_screen extends StatefulWidget {
  home_screen({super.key});

  @override
  State<home_screen> createState() => _home_screenState();
}

class _home_screenState extends State<home_screen> {
  final post_controller post = Get.put(post_controller());
  final like_controller like = Get.put(like_controller());
  final favorite_controller favorite = Get.put(favorite_controller());
  final comment_controller comment = Get.put(comment_controller());
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        elevation: 0,
        backgroundColor: Colors.blueAccent,
        title: Text(
          "New app${data['user']['name']}",
          style: TextStyle(
            fontSize: 20,
            color: Colors.white,
          ),
        ),
        foregroundColor: Colors.white,
        actions: [
          IconButton(
            onPressed: () {},
            icon: const Icon(
              Icons.notifications,
            ),
          )
        ],
      ),
      drawer: drawer(),
      body: Obx(
        () => ListView.builder(
          itemCount: post.posts.length,
          itemBuilder: (context, index) {
            final posts = post.posts[index];
            return Padding(
              padding: const EdgeInsets.all(8.0),
              child: Container(
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(8),
                  border: Border.all(color: Colors.grey),
                ),
                child: Column(
                  children: [
                    Padding(
                      padding: const EdgeInsets.all(5.0),
                      child: Container(
                        height: 60,
                        width: double.infinity,
                        child: Row(
                          mainAxisAlignment: MainAxisAlignment.spaceBetween,
                          children: [
                            Row(
                              children: [
                                Padding(
                                  padding: const EdgeInsets.all(0),
                                  child: CircleAvatar(
                                    radius: 40,
                                    foregroundImage: NetworkImage(
                                      posts.user.image,
                                    ),
                                  ),
                                ),
                                Padding(
                                  padding: const EdgeInsets.only(left: 10),
                                  child: Text(
                                    posts.user.name,
                                  ),
                                ),
                              ],
                            ),
                            Padding(
                              padding: const EdgeInsets.all(0),
                              child: IconButton(
                                onPressed: () {
                                  favorite.addfovorite(posts.id);
                                  // print(favorite.favorites);
                                },
                                icon: Icon(Icons.more_horiz_sharp),
                              ),
                            ),
                          ],
                        ),
                      ),
                    ),
                    Padding(
                      padding: EdgeInsets.all(8.0),
                      child: Text(
                        posts.title.toString(),
                        textAlign: TextAlign.start,
                        style: TextStyle(
                          color: Colors.black,
                          fontSize: 12,
                        ),
                        maxLines: 3, // Maximum number of lines
                        overflow: TextOverflow.ellipsis, // Overflow behavior
                      ),
                    ),
                    Padding(
                      padding: const EdgeInsets.all(8.0),
                      child: InkWell(
                        onTap: () {
                          Get.to(review_new(
                            posts: posts,
                          ));
                        },
                        child: Container(
                          height: 200,
                          width: double.infinity,
                          decoration: BoxDecoration(
                            borderRadius: BorderRadius.circular(8),
                          ),
                          child: ClipRRect(
                            borderRadius: BorderRadius.circular(8),
                            child: Image(
                              image: NetworkImage(
                                post.posts[index].image,
                              ),
                              fit: BoxFit.cover,
                            ),
                          ),
                        ),
                      ),
                    ),
                    Padding(
                      padding: const EdgeInsets.all(8.0),
                      child: Container(
                        height: 60,
                        width: double.infinity,
                        child: Row(
                          children: [
                            InkWell(
                              onTap: () {
                                setState(() {
                                  comment.getid(posts.id);
                                  Comment_function();
                                });
                              },
                              child: Container(
                                height: 60,
                                width: 125,
                                child: Row(
                                  mainAxisAlignment: MainAxisAlignment.center,
                                  children: [
                                    Icon(Icons.chat),
                                    Padding(
                                      padding: EdgeInsets.only(left: 5),
                                      child: Text('Comment'),
                                    ),
                                  ],
                                ),
                              ),
                            ),
                            InkWell(
                              onTap: () {
                                setState(() {
                                  if (posts.like.length == 0) {
                                    like.likeorunlike(posts.id.toString());
                                  } else {
                                    like.likeorunlike(
                                      posts.id.toString(),
                                    );
                                  }
                                });
                              },
                              child: Container(
                                height: 60,
                                width: 125,
                                child: Center(
                                  child: Row(
                                    mainAxisAlignment: MainAxisAlignment.center,
                                    children: [
                                      posts.like.length == 0
                                          ? Icon(Icons.thumb_up)
                                          : Icon(
                                              Icons.thumb_up,
                                              color: Colors.red,
                                            ),
                                      Padding(
                                        padding: EdgeInsets.only(left: 5),
                                        child: Text(
                                          posts.likeCount.toString(),
                                        ),
                                      ),
                                    ],
                                  ),
                                ),
                              ),
                            ),
                            Container(
                              height: 60,
                              width: 125,
                              child: Center(
                                child: Row(
                                  mainAxisAlignment: MainAxisAlignment.center,
                                  children: [
                                    Icon(Icons.share),
                                    Padding(
                                      padding: EdgeInsets.only(left: 5),
                                      child: Text('Share'),
                                    ),
                                  ],
                                ),
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
    );
  }
}
