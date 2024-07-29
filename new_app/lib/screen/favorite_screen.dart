import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:get/get_connect/http/src/utils/utils.dart';
import 'package:new_app/controller/favorite_controller.dart';
import 'package:new_app/controller/post_controller.dart';
import 'package:new_app/screen/review_new.dart';

class favorite_screen extends StatefulWidget {
  favorite_screen({super.key});

  @override
  State<favorite_screen> createState() => _favorite_screenState();
}

class _favorite_screenState extends State<favorite_screen> {
  final favorite_controller favorite = Get.put(favorite_controller());

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        elevation: 0,
        title: Text('Favorite'),
        centerTitle: true,
        backgroundColor: Colors.white,
      ),
      body: Obx(
        () => favorite.favorites.length == 0
            ? Center(
                child: Text("No Data"),
              )
            : ListView.builder(
                physics: BouncingScrollPhysics(
                  parent: AlwaysScrollableScrollPhysics(),
                ),
                itemCount: favorite.favorites.length,
                itemBuilder: (context, index) {
                  return InkWell(
                    onTap: () {
                      // Get.to(review_new());
                    },
                    child: Padding(
                      padding: const EdgeInsets.all(2.0),
                      child: Container(
                        height: 120,
                        width: double.infinity,
                        decoration: BoxDecoration(
                          border: Border.all(
                            color: Colors.grey,
                            width: 2,
                          ),
                        ),
                        child: Row(
                          children: [
                            Padding(
                              padding: const EdgeInsets.all(8.0),
                              child: Container(
                                width: 180,
                                decoration: BoxDecoration(
                                  borderRadius: BorderRadius.circular(8),
                                  color: const Color.fromARGB(255, 37, 30, 30),
                                ),
                                child: ClipRRect(
                                  borderRadius: BorderRadius.circular(5),
                                  child: Image(
                                    image: NetworkImage(
                                      favorite.favorites[index].post.image,
                                    ),
                                    fit: BoxFit.cover,
                                  ),
                                ),
                              ),
                            ),
                            Expanded(
                              child: Padding(
                                padding: const EdgeInsets.only(
                                    top: 8, right: 8, bottom: 8),
                                child: Stack(
                                  children: [
                                    Container(
                                      height: 120,
                                      child: Column(
                                        mainAxisAlignment:
                                            MainAxisAlignment.end,
                                        children: [
                                          Text(
                                            favorite
                                                .favorites[index].post.title,
                                            style: TextStyle(
                                              fontSize: 13,
                                            ),
                                            maxLines:
                                                3, // Maximum number of lines
                                            overflow: TextOverflow.ellipsis,
                                          ),
                                        ],
                                      ),
                                    ),
                                    Row(
                                      mainAxisAlignment: MainAxisAlignment.end,
                                      children: [
                                        InkWell(
                                          onTap: () {
                                            setState(() {
                                              favorite.unfovorite(
                                                favorite
                                                    .favorites[index].post.id,
                                              );
                                            });
                                          },
                                          child: Container(
                                            height: 30,
                                            width: 50,
                                            decoration: BoxDecoration(
                                              border: Border.all(
                                                color: Colors.grey,
                                              ),
                                              borderRadius: BorderRadius.only(
                                                bottomRight:
                                                    Radius.circular(10),
                                                topLeft: Radius.circular(10),
                                              ),
                                            ),
                                            child: Icon(
                                              Icons.delete_forever,
                                              color: Colors.red,
                                            ),
                                          ),
                                        ),
                                      ],
                                    ),
                                  ],
                                ),
                              ),
                            ),
                          ],
                        ),
                      ),
                    ),
                  );
                },
              ),
      ),
    );
  }
}
