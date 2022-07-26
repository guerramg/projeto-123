USE [master]
GO
/****** Object:  Database [milhas]    Script Date: 23/07/2022 15:25:21 ******/
CREATE DATABASE [milhas]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'milhas', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\milhas.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'milhas_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\milhas_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
ALTER DATABASE [milhas] SET COMPATIBILITY_LEVEL = 150
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [milhas].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [milhas] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [milhas] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [milhas] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [milhas] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [milhas] SET ARITHABORT OFF 
GO
ALTER DATABASE [milhas] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [milhas] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [milhas] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [milhas] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [milhas] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [milhas] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [milhas] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [milhas] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [milhas] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [milhas] SET  DISABLE_BROKER 
GO
ALTER DATABASE [milhas] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [milhas] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [milhas] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [milhas] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [milhas] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [milhas] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [milhas] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [milhas] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [milhas] SET  MULTI_USER 
GO
ALTER DATABASE [milhas] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [milhas] SET DB_CHAINING OFF 
GO
ALTER DATABASE [milhas] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [milhas] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [milhas] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [milhas] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
ALTER DATABASE [milhas] SET QUERY_STORE = OFF
GO
USE [milhas]
GO
/****** Object:  Table [dbo].[atendentes]    Script Date: 23/07/2022 15:25:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[atendentes](
	[idAtendente] [int] IDENTITY(1,1) NOT NULL,
	[atendente] [nchar](50) NOT NULL,
 CONSTRAINT [PK_atendentes] PRIMARY KEY CLUSTERED 
(
	[idAtendente] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[demandas]    Script Date: 23/07/2022 15:25:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[demandas](
	[idDemanda] [int] IDENTITY(1,1) NOT NULL,
	[dataCadastro] [date] NOT NULL,
	[dataPrevisao] [date] NOT NULL,
	[dataTermino] [date] NULL,
	[idAtendente] [int] NOT NULL,
	[idUsuario] [int] NOT NULL,
	[descricao] [text] NOT NULL,
	[custo] [decimal](14, 2) NOT NULL,
	[obs] [text] NULL,
 CONSTRAINT [PK_demandas] PRIMARY KEY CLUSTERED 
(
	[idDemanda] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[setores]    Script Date: 23/07/2022 15:25:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[setores](
	[idSetor] [int] IDENTITY(1,1) NOT NULL,
	[setor] [nchar](50) NOT NULL,
 CONSTRAINT [PK_setores] PRIMARY KEY CLUSTERED 
(
	[idSetor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 23/07/2022 15:25:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[idUsuario] [int] IDENTITY(1,1) NOT NULL,
	[usuario] [nchar](50) NOT NULL,
	[idSetor] [int] NOT NULL,
 CONSTRAINT [PK_users] PRIMARY KEY CLUSTERED 
(
	[idUsuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[atendentes] ON 

INSERT [dbo].[atendentes] ([idAtendente], [atendente]) VALUES (7, N'Maria José                                        ')
INSERT [dbo].[atendentes] ([idAtendente], [atendente]) VALUES (8, N'João Roberto                                      ')
INSERT [dbo].[atendentes] ([idAtendente], [atendente]) VALUES (9, N'José Eustáquio                                    ')
INSERT [dbo].[atendentes] ([idAtendente], [atendente]) VALUES (10, N'Marlene Lima                                      ')
INSERT [dbo].[atendentes] ([idAtendente], [atendente]) VALUES (11, N'Natalia Ferreira                                  ')
SET IDENTITY_INSERT [dbo].[atendentes] OFF
GO
SET IDENTITY_INSERT [dbo].[demandas] ON 

INSERT [dbo].[demandas] ([idDemanda], [dataCadastro], [dataPrevisao], [dataTermino], [idAtendente], [idUsuario], [descricao], [custo], [obs]) VALUES (11, CAST(N'2022-07-23' AS Date), CAST(N'2022-07-23' AS Date), NULL, 11, 9, N'Reserva Azul', CAST(5932.90 AS Decimal(14, 2)), N'Reserva passagem GRUxNEV')
SET IDENTITY_INSERT [dbo].[demandas] OFF
GO
SET IDENTITY_INSERT [dbo].[setores] ON 

INSERT [dbo].[setores] ([idSetor], [setor]) VALUES (1005, N'Milhas                                            ')
INSERT [dbo].[setores] ([idSetor], [setor]) VALUES (1006, N'Hoteis                                            ')
INSERT [dbo].[setores] ([idSetor], [setor]) VALUES (1007, N'Passagens                                         ')
SET IDENTITY_INSERT [dbo].[setores] OFF
GO
SET IDENTITY_INSERT [dbo].[users] ON 

INSERT [dbo].[users] ([idUsuario], [usuario], [idSetor]) VALUES (7, N'Carlos Henrique                                   ', 1005)
INSERT [dbo].[users] ([idUsuario], [usuario], [idSetor]) VALUES (8, N'Jonas Silva                                       ', 1006)
INSERT [dbo].[users] ([idUsuario], [usuario], [idSetor]) VALUES (9, N'Ayumi Guerra                                      ', 1007)
INSERT [dbo].[users] ([idUsuario], [usuario], [idSetor]) VALUES (10, N'Luna Shibath                                      ', 1006)
INSERT [dbo].[users] ([idUsuario], [usuario], [idSetor]) VALUES (11, N'Kim Dornelas                                      ', 1005)
INSERT [dbo].[users] ([idUsuario], [usuario], [idSetor]) VALUES (12, N'Júlia Silva                                       ', 1007)
INSERT [dbo].[users] ([idUsuario], [usuario], [idSetor]) VALUES (13, N'Vlad Shuewz                                       ', 1005)
INSERT [dbo].[users] ([idUsuario], [usuario], [idSetor]) VALUES (14, N'Doug Macain                                       ', 1006)
INSERT [dbo].[users] ([idUsuario], [usuario], [idSetor]) VALUES (15, N'Shakira Fontes                                    ', 1007)
INSERT [dbo].[users] ([idUsuario], [usuario], [idSetor]) VALUES (16, N'Dani Lima                                         ', 1007)
SET IDENTITY_INSERT [dbo].[users] OFF
GO
USE [master]
GO
ALTER DATABASE [milhas] SET  READ_WRITE 
GO
