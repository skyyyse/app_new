import 'package:new_app/model/user_model.dart';
class comment_model{
  final int id;
  final String comment;
  final int user_id;
  final int post_id;
  User user;
  comment_model({
    required this.id,
    required this.comment,
    required this.user_id,
    required this.post_id,
    required this.user
  });
  factory comment_model.fromjson(Map<String,dynamic>json){
    return comment_model(
      id:json['id'],
      comment:json['comment'],
      user_id:json['user_id'],
      post_id:json['post_id'],
      user: User.fromJson(json['user']),
    );
  }
}