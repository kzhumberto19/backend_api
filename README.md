# backend_api
Proyecto CRUD + Login en PHP por medio de APIS Y JWT

Login API
{
    "email" : "kh17728@gmail.com",
    "password" : "123456"
}

Create Post
{
    "title" 		: "test",
	"description" 	: "test",
	"create_at" 	: "2022-01-22 03:33:27",
	"id_user" 		: 1,
	"token"         : "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2NDI4Mjc4NDMsImlhdCI6MTY0MjgyNDI0MywiZGF0YSI6eyJpZCI6IjEiLCJmaXJzdG5hbWUiOiJIdW1iZXJ0byIsImxhc3RuYW1lIjoiSGVybmFuZGV6IiwiZW1haWwiOiJraDE3NzI4QGdtYWlsLmNvbSIsInJvbCI6IjUifX0.7Tjw8Vxagrap8uhA9VH_5YnnLMddS8M40fVbU8ZA6jI"
}

Update Post
{
    "title" 		: "El principito",
	"description" 	: "Es un adulto que intenta razonar y actuar como un niño, para recuperar al niño que todos hemos sido y que llevamos dentro. Es nuestra propia imagen, nuestro reflejo en la historia; el personaje que nos identifica y nos hace ver cómo deberíamos ver las cosas y cómo las vemos en realidad",
	"id" 		    : 1,
	"token"         : "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2NDI4MzMzNjAsImlhdCI6MTY0MjgyOTc2MCwiZGF0YSI6eyJpZCI6IjEiLCJmaXJzdG5hbWUiOiJIdW1iZXJ0byIsImxhc3RuYW1lIjoiSGVybmFuZGV6IiwiZW1haWwiOiJraDE3NzI4QGdtYWlsLmNvbSIsInJvbCI6IjUifX0.R3KuejFUxqsqp1N8twNgNVf6GkIYttfdWvUrDXYMquk"
}

Delete Post
{
	"id" 		: 15,
	"token"         : "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2NDI4MzkwMzksImlhdCI6MTY0MjgzNTQzOSwiZGF0YSI6eyJpZCI6IjEiLCJmaXJzdG5hbWUiOiJIdW1iZXJ0byIsImxhc3RuYW1lIjoiSGVybmFuZGV6IiwiZW1haWwiOiJraDE3NzI4QGdtYWlsLmNvbSIsInJvbCI6IjUifX0.G6OR1ay_jfoJYVTv78s7m_6EmIemJPFYxBCQyhk5z3o"
}


index Post
http://geniat.test/?api=index_posts&token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2NDI4MzgxMzAsImlhdCI6MTY0MjgzNDUzMCwiZGF0YSI6eyJpZCI6IjEiLCJmaXJzdG5hbWUiOiJIdW1iZXJ0byIsImxhc3RuYW1lIjoiSGVybmFuZGV6IiwiZW1haWwiOiJraDE3NzI4QGdtYWlsLmNvbSIsInJvbCI6IjUifX0.vsaC2MBJ_Fi6l8PjRx1MVgnMgn9GbqkYZt3XrJxLvQc

Show Post
http://geniat.test/?api=show_post&token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2NDI4MzgxMzAsImlhdCI6MTY0MjgzNDUzMCwiZGF0YSI6eyJpZCI6IjEiLCJmaXJzdG5hbWUiOiJIdW1iZXJ0byIsImxhc3RuYW1lIjoiSGVybmFuZGV6IiwiZW1haWwiOiJraDE3NzI4QGdtYWlsLmNvbSIsInJvbCI6IjUifX0.vsaC2MBJ_Fi6l8PjRx1MVgnMgn9GbqkYZt3XrJxLvQc&id=16