USE [PPE3_BDD]
GO
/****** Object:  Table [dbo].[Personnel]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Personnel](
	[idPersonnel] [int] IDENTITY(1,1) NOT NULL,
	[nomPersonnel] [varchar](50) NULL,
	[prenomPersonnel] [varchar](50) NULL,
	[matriculePersonnel] [varchar](50) NULL,
	[email] [varchar](50) NULL,
	[mdp] [varchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[idPersonnel] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Visiteur]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Visiteur](
	[idVisiteur] [int] NOT NULL,
	[Objectif] [varchar](50) NULL,
	[Prime] [varchar](50) NULL,
	[avantage] [varchar](50) NULL,
	[idBudget] [int] NOT NULL,
 CONSTRAINT [PK__Visiteur__0AA4706CB853D40C] PRIMARY KEY CLUSTERED 
(
	[idVisiteur] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  View [dbo].[Vue_Personnel_Visiteur]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE VIEW [dbo].[Vue_Personnel_Visiteur]
AS
SELECT dbo.Visiteur.idVisiteur, dbo.Personnel.prenomPersonnel, dbo.Personnel.nomPersonnel, dbo.Personnel.matriculePersonnel, dbo.Personnel.email
FROM     dbo.Personnel INNER JOIN
                  dbo.Visiteur ON dbo.Personnel.idPersonnel = dbo.Visiteur.idVisiteur
GO
/****** Object:  Table [dbo].[Responsable]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Responsable](
	[idResponsable] [int] NOT NULL,
	[specialite] [varchar](50) NULL,
	[regionResponsable] [varchar](50) NULL,
 CONSTRAINT [PK__Responsa__6D0A5251C9798E38] PRIMARY KEY CLUSTERED 
(
	[idResponsable] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  View [dbo].[Vue_Personnel_Responsable]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE VIEW [dbo].[Vue_Personnel_Responsable]
AS
SELECT dbo.Responsable.idResponsable, dbo.Personnel.nomPersonnel, dbo.Personnel.prenomPersonnel, dbo.Personnel.matriculePersonnel, dbo.Personnel.email, dbo.Responsable.regionResponsable
FROM     dbo.Personnel INNER JOIN
                  dbo.Responsable ON dbo.Personnel.idPersonnel = dbo.Responsable.idResponsable
GO
/****** Object:  Table [dbo].[Activite]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Activite](
	[idActivite] [int] IDENTITY(1,1) NOT NULL,
	[compteRendu] [varchar](50) NULL,
	[numAccord] [varchar](50) NULL,
	[theme] [varchar](50) NULL,
	[cocktailOffert] [varchar](50) NULL,
	[idVisiteur] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idActivite] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Admin]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Admin](
	[idAdmin] [int] IDENTITY(1,1) NOT NULL,
	[nomAdmin] [varchar](50) NULL,
	[prenomAdmin] [varchar](50) NULL,
	[emailAdmin] [varchar](255) NULL,
	[mdpAdmin] [varchar](255) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Asso_13]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Asso_13](
	[idPraticien] [int] NOT NULL,
	[idActivite] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idPraticien] ASC,
	[idActivite] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Budget]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Budget](
	[idBudget] [int] IDENTITY(1,1) NOT NULL,
	[sold] [varchar](50) NULL,
	[annee] [date] NULL,
PRIMARY KEY CLUSTERED 
(
	[idBudget] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Composition]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Composition](
	[idComposition] [int] IDENTITY(1,1) NOT NULL,
	[listeComp] [varchar](50) NULL,
	[quantiteComp] [varchar](50) NULL,
	[interactionAutreMedic_] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[idComposition] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Echantillon]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Echantillon](
	[idProduit] [int] NOT NULL,
	[idVisite] [int] NOT NULL,
	[nbrsEchantillon] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[idProduit] ASC,
	[idVisite] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[failed_jobs]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[failed_jobs](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[uuid] [nvarchar](255) NOT NULL,
	[connection] [nvarchar](max) NOT NULL,
	[queue] [nvarchar](max) NOT NULL,
	[payload] [nvarchar](max) NOT NULL,
	[exception] [nvarchar](max) NOT NULL,
	[failed_at] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Historique_Visite]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Historique_Visite](
	[dateVisite] [varchar](50) NULL,
	[motifVisite] [varchar](50) NULL,
	[medocPresente] [varchar](50) NULL,
	[dateHisto] [date] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[migrations]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[migrations](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[migration] [nvarchar](255) NOT NULL,
	[batch] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[password_resets]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[password_resets](
	[email] [nvarchar](255) NOT NULL,
	[token] [nvarchar](255) NOT NULL,
	[created_at] [datetime] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Praticien]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Praticien](
	[idPraticien] [int] IDENTITY(1,1) NOT NULL,
	[nomPratic] [varchar](50) NULL,
	[prenomPratic] [varchar](50) NULL,
	[influence] [varchar](50) NULL,
	[entouragePro] [varchar](50) NULL,
	[idSpecialite] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idPraticien] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Produit]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Produit](
	[idProduit] [int] IDENTITY(1,1) NOT NULL,
	[numProduit] [varchar](50) NULL,
	[nom_commercial] [varchar](50) NULL,
	[posologie] [varchar](50) NULL,
	[famille] [varchar](50) NULL,
	[prixEchantillon] [varchar](50) NULL,
	[idComposition] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idProduit] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Specialite]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Specialite](
	[idSpecialite] [int] IDENTITY(1,1) NOT NULL,
	[diplome] [varchar](50) NULL,
	[coefPrescription] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[idSpecialite] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[email] [nvarchar](255) NOT NULL,
	[email_verified_at] [datetime] NULL,
	[password] [nvarchar](255) NOT NULL,
	[remember_token] [nvarchar](100) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Visite]    Script Date: 09/05/2021 12:43:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Visite](
	[idVisite] [int] IDENTITY(1,1) NOT NULL,
	[dateVisite] [varchar](50) NULL,
	[motifVisite] [varchar](50) NULL,
	[medocPresente] [varchar](50) NULL,
	[idVisiteur] [int] NOT NULL,
	[idPraticien] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idVisite] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[Activite] ON 

INSERT [dbo].[Activite] ([idActivite], [compteRendu], [numAccord], [theme], [cocktailOffert], [idVisiteur]) VALUES (1, N'danger de mort', N'56465', N'cancer du sein', N'1', 3)
SET IDENTITY_INSERT [dbo].[Activite] OFF
GO
SET IDENTITY_INSERT [dbo].[Admin] ON 

INSERT [dbo].[Admin] ([idAdmin], [nomAdmin], [prenomAdmin], [emailAdmin], [mdpAdmin]) VALUES (1, N'Peybernes', N'Samuel', N'samuelpeybernes33gmail.com', N'12345')
SET IDENTITY_INSERT [dbo].[Admin] OFF
GO
INSERT [dbo].[Asso_13] ([idPraticien], [idActivite]) VALUES (3, 1)
GO
SET IDENTITY_INSERT [dbo].[Budget] ON 

INSERT [dbo].[Budget] ([idBudget], [sold], [annee]) VALUES (1, N'200€', CAST(N'2010-10-20' AS Date))
SET IDENTITY_INSERT [dbo].[Budget] OFF
GO
SET IDENTITY_INSERT [dbo].[Composition] ON 

INSERT [dbo].[Composition] ([idComposition], [listeComp], [quantiteComp], [interactionAutreMedic_]) VALUES (1, N'povidone,lsd, acetone', N'1000mg', N'heroine')
INSERT [dbo].[Composition] ([idComposition], [listeComp], [quantiteComp], [interactionAutreMedic_]) VALUES (2, N'fridone 400', N'250mg', N'0')
SET IDENTITY_INSERT [dbo].[Composition] OFF
GO
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2020-14-14', N'virus', N'loi', CAST(N'2020-11-26' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'0002-02-22', N'test2', N'test2', CAST(N'2020-12-16' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'1111-11-10', N'virus', N'virus', CAST(N'2020-12-16' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2220-02-10', N'virus', N'virus', CAST(N'2020-12-16' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2020-02-10', N'virus', N'virus', CAST(N'2020-12-16' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2200-02-11', N'mal', N'mal', CAST(N'2020-12-16' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2030-02-11', N'test1', N'test1', CAST(N'2020-12-16' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2200-02-10', N'test1', N'test1', CAST(N'2020-12-17' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'1111-02-10', N'testultime3', N'doliprane', CAST(N'2020-12-17' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2020-12-10', N'virus', N'vaccin', CAST(N'2020-12-17' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2020-02-10', N'test3', N'test3', CAST(N'2020-12-17' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'0002-02-22', N'test2', N'test2', CAST(N'2020-12-17' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2020-10-10', N'mal au dos', N'pommade', CAST(N'2020-12-17' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2222-02-10', N'virus', N'doliprane', CAST(N'2020-12-17' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2021-02-09', N'leelelelel', N'Doliprane', CAST(N'2021-02-07' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2021-02-08', N'virus', N'Doliprane', CAST(N'2021-02-07' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2021-02-10', N'dddd', N'Doliprane', CAST(N'2021-02-07' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2021-02-22', N'virus', N'Doliprane', CAST(N'2021-02-07' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2021-02-13', N'virus', N'Doliprane', CAST(N'2021-02-07' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2021-02-17', N'jfjffjfjjf', N'Doliprane', CAST(N'2021-02-07' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2021-02-12', N'ddddddddddddddededededed', N'Doliprane', CAST(N'2021-02-07' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2021-02-18', N'ffffffffffffffffffffffffffffff', N'Doliprane', CAST(N'2021-02-07' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2021-02-09', N'maladie', N'Doliprane', CAST(N'2021-02-07' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2021-02-11', N'dddddddddddd', N'Doliprane', CAST(N'2021-02-07' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2021-02-11', N'virus', N'Viagra', CAST(N'2021-02-11' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2200-02-13', N'jdjdjdjdjdjd', N'Doliprane', CAST(N'2021-02-11' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2021-02-25', N'ddddddddddddddddd', N'Doliprane', CAST(N'2021-02-15' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2021-02-17', N'test', N'Doliprane', CAST(N'2021-02-15' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2021-02-11', N'TESTPEVI111', N'Doliprane', CAST(N'2021-02-15' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2021-02-10', N'TESTPEVI111', N'Doliprane', CAST(N'2021-02-15' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2021-02-09', N'virustest', N'Doliprane', CAST(N'2021-02-15' AS Date))
INSERT [dbo].[Historique_Visite] ([dateVisite], [motifVisite], [medocPresente], [dateHisto]) VALUES (N'2220-02-10', N'covid', N'doliprane', CAST(N'2020-12-17' AS Date))
GO
SET IDENTITY_INSERT [dbo].[migrations] ON 

INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (1, N'2014_10_12_000000_create_users_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (2, N'2014_10_12_100000_create_password_resets_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (3, N'2019_08_19_000000_create_failed_jobs_table', 1)
SET IDENTITY_INSERT [dbo].[migrations] OFF
GO
SET IDENTITY_INSERT [dbo].[Personnel] ON 

INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (1, N'BARAQUE', N'Obama', N'baoba', N'baraqueobama@whitehouse.com', N'$2a$10$t3TyRvS5CLgvJuh0GuUp2uvY5/CuroHKctLBVS7yi5jdoBvB90mZe')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (2, N'TRUMP', N'Donald', N'trdod', N'donaldtrump@whitehouse.com', N'$2a$10$a5rswxQDgR5fNMs4Tq37y.Qaf5./qilIwZtjobK2UTurhti79ajNu')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (3, N'THERASSE', N'Lucas', N'thlus', N'therasse.lucas@gmail.com', N'$2a$10$EHplQ.O7v5zpsStsYmXBD.aJDqwzCTn9TP45/UxtOBgoGzWWFM4R.')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (4, N'THERASSE', N'mathieu', N'thmau', N'therassemathieu@lui.fr', N'$2a$10$nfFyXJKb.V7Hfe9AKYSByuFz4jhh7ki5MDk9ONt6zpVN20vm7sKmi')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (5, N'PEYBERNES', N'Samuel', N'pesal', N'samuelpeybernes33@gmail.com', N'$2a$10$6bx1NxUykVZJkDPELtDPNuaqOdK6Ny.4wDEUn5.S7bazlXV2Jevm2')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (6, N'PIERRO', N'albert', N'pialt', N'pierroalbert@gmail.com', N'$2a$10$S86R788BrEc0aeQfjaFCa.vaThO/bJI.D1h6kfW9rMg3ob6zPeXv2')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (7, N'PEYBERNES', N'Vincent', N'pevit', N'vincentpeybernes@gmail.com', N'$2a$10$Kz.f.pcmVEtDTtSvq3ouNOSpSu0inwdmtrlX4KBW2Dk9sOksAj23C')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (8, N'OUI', N'non', N'ounon', N'ouinon@gmail.com', N'$2a$10$7vq..cgzdKOU6Ar4Qu1Gb.DMiMwzKsqY7mpyqx0zVNSF8SbkEbkPK')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (9, N'LUDOVIC', N'Renaut', N'luret', N'ludoreno@gmail.com', N'$2a$10$BLS5pKjhxGswH15PGJuBTeh.FgG1yPfSo6X6b1T86S2zeIZqv71Tu')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (10, N'LUI', N'Lea', N'lulea', N'ldldldl@gmail.com', N'$2a$10$V.Wx1Vb52LhK1t6b9tXfNuHTp2oobxyXvTHJqsEHXQm75K6nwsewe')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (15, N'LOUI', N'Perroquet', N'lopet', N'louiperoquet@gmail.com', N'$2a$10$c7R7X9nzZGzYqK/0FngIjeMbtAgdaaxEhbNLxA5O8z4EUKRpRimxu')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (16, N'HENRI', N'Bernio', N'hebeo', N'henrilege@gmail.com', N'$2a$10$QCqqN4oX6JZJdh/Ov19cee6Tm.myJWwz9Fi/p0JE/poSW/vOkd97.')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (17, N'BERNARD', N'Yve', N'beyve', N'fhfhfhfh@gmail.com', N'$2a$10$5Ml0bxen2UwZ3LBeFnmvOOsNRTJyZElugYQ/NFMHP0bLbXxePxIMK')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (18, N'JULIEN', N'Leperse', N'julee', N'julienleperse@gmail.com', N'$2a$10$VqI4v2Z6YcDunpJdkBVLP.OiM9B6CgL0RcNtPLyOns4.s2N0XvZUe')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (19, N'PERSONNEL', N'responsable1', N'pere1', N'personnelresponsable1@gmail.com', N'$2a$10$54N8ZYZK93VPcyagLX0lL.4hxz2OxC4iu73GdTJm6r/UathBr3o5u')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (20, N'PERSONNEL', N'visiteur1', N'pevi1', N'personnelvisiteur1@gmail.com', N'$2a$10$Mde2yAxnf9lo1XSSwL0a3.nFHptC0ASAr7TVCDvEovGwFCSa6rMF2')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (21, N'PERSONNEL', N'visiteur2', N'pevi2', N'personnelvisiteur2@gmail.com', N'$2a$10$WP58/fl11P5mE97s80P5O.YQSublRrc0zem/9HOT4orEjGQZK2Lpm')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (23, N'PERSONNEL', N'responsable2', N'pere2', N'personnelresponsable2@gmail.com', N'$2a$10$erzRgdCPTBXs74MQAwdKY.FICeeuK4WR5skj9GxgpyPsXrUFoZnge')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (24, N'JUBELY', N'Eglantine', N'juege', N'eglantine@gmail.com', N'$2a$10$INXDaWepmoI9OaQNmrpvcupj6HFlGEQIvN1s9si8OMDlBHWw2ntU2')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (25, N'JUBELY', N'Eglantine', N'juege', N'eglantine@gmail.com', N'$2a$10$.SPXP2A94ScyTa/M/7dGIuIGgLvpO/ujvHgsQmpLaw6RXkq4sCqJC')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (26, N'JUBELY', N'Eglantine', N'juege', N'eglantine@gmail.com', N'$2a$10$tL.bS/G4jRBeq6VxahGjZuPC2zzfv5gc6iyCVq861PWc9uyOOXPla')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (27, N'BASTIDE', N'Armand', N'baard', N'bastide@gmail.com', N'$2a$10$dZezO/Xzf/kSlLbDsW7xROycNGFwB75XEqmPz5JcHt0aWY3PeYBkS')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (28, N'TESTTRIG', N'TestTrig', N'teteg', N'TestTrig@gmail.com', N'$2a$10$KPmI8GbesmPMbFX2gN3B6eAjlnhHXYOh4Ozh4eV3WcjmaXt1VVwHS')
INSERT [dbo].[Personnel] ([idPersonnel], [nomPersonnel], [prenomPersonnel], [matriculePersonnel], [email], [mdp]) VALUES (33, N'TESTTRIG', N'Testtrig', N'teteg', N'Testtrig@gmail.com', N'$2a$10$FHnQbLMBrw6t8SvdF8LPcuEUF2PkkZ7EFyNIiU4sLBZbzg2fG0nLG')
SET IDENTITY_INSERT [dbo].[Personnel] OFF
GO
SET IDENTITY_INSERT [dbo].[Praticien] ON 

INSERT [dbo].[Praticien] ([idPraticien], [nomPratic], [prenomPratic], [influence], [entouragePro], [idSpecialite]) VALUES (3, N'Dupond', N'Frédéric', N'62/100', N'Prescripteur', 1)
INSERT [dbo].[Praticien] ([idPraticien], [nomPratic], [prenomPratic], [influence], [entouragePro], [idSpecialite]) VALUES (4, N'PEYBERNES', N'tom', N'64/100', N'prescripteur', 1)
SET IDENTITY_INSERT [dbo].[Praticien] OFF
GO
SET IDENTITY_INSERT [dbo].[Produit] ON 

INSERT [dbo].[Produit] ([idProduit], [numProduit], [nom_commercial], [posologie], [famille], [prixEchantillon], [idComposition]) VALUES (1, NULL, N'Doliprane', N'2xj', N'antipyétique', N'1.16€', 1)
INSERT [dbo].[Produit] ([idProduit], [numProduit], [nom_commercial], [posologie], [famille], [prixEchantillon], [idComposition]) VALUES (2, NULL, N'Viagra', N'1xj', N'complement', N'10€', 2)
SET IDENTITY_INSERT [dbo].[Produit] OFF
GO
INSERT [dbo].[Responsable] ([idResponsable], [specialite], [regionResponsable]) VALUES (1, N'', N'Washington DC')
INSERT [dbo].[Responsable] ([idResponsable], [specialite], [regionResponsable]) VALUES (2, NULL, N'Washington')
INSERT [dbo].[Responsable] ([idResponsable], [specialite], [regionResponsable]) VALUES (5, N'testsam', N'samville')
INSERT [dbo].[Responsable] ([idResponsable], [specialite], [regionResponsable]) VALUES (6, N'homme heureux', N'perigore')
INSERT [dbo].[Responsable] ([idResponsable], [specialite], [regionResponsable]) VALUES (19, N'test1', N'ville1')
INSERT [dbo].[Responsable] ([idResponsable], [specialite], [regionResponsable]) VALUES (23, N'test2', N'ville2')
INSERT [dbo].[Responsable] ([idResponsable], [specialite], [regionResponsable]) VALUES (28, NULL, N'ville2')
GO
SET IDENTITY_INSERT [dbo].[Specialite] ON 

INSERT [dbo].[Specialite] ([idSpecialite], [diplome], [coefPrescription]) VALUES (1, N'doctorat de médecine', N'Généraliste')
SET IDENTITY_INSERT [dbo].[Specialite] OFF
GO
SET IDENTITY_INSERT [dbo].[Visite] ON 

INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (15, N'2020-03-11', N'maladie', N'dolipranee', 21, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (33, N'2200-02-10', N'test1', N'test1', 23, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (40, N'2002-12-20', N'Mal au ventre', N'lisopaine', 23, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (41, N'2002-12-20', N'Mal au ventre', N'lisopaine', 23, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (43, N'2220-02-10', N'virus', N'doliprane', 23, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (46, N'1111-10-10', N'11111', N'1111', 23, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (47, N'1111-10-10', N'11111', N'1111', 23, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (49, N'2021-02-13', N'virus', N'Doliprane', 20, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (56, N'2021-02-11', N'maladie', N'Doliprane', 21, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (57, N'2021-02-11', N'maladie', N'Doliprane', 21, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (58, N'2021-02-09', N'testultime', N'Doliprane', 21, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (60, N'2021-02-03', N'virus', N'Doliprane', 20, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (68, N'2021-02-17', N'maladie', N'Doliprane', 20, 4)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (70, N'2021-02-12', N'testresp', N'Viagra', 19, 4)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (71, N'2021-02-12', N'TESTPEVI1', N'Viagra', 19, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (72, N'2021-02-10', N'virus', N'Doliprane', 23, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (73, N'2021-02-10', N'TESTPEVI1111111', N'Viagra', 23, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (74, N'2021-02-09', N'TESTSTSTSTS', N'Doliprane', 23, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (75, N'2021-02-10', N'LETESTOUILLE', N'Doliprane', 23, 3)
INSERT [dbo].[Visite] ([idVisite], [dateVisite], [motifVisite], [medocPresente], [idVisiteur], [idPraticien]) VALUES (76, N'2021-02-10', N'TEST20', N'Doliprane', 23, 3)
SET IDENTITY_INSERT [dbo].[Visite] OFF
GO
INSERT [dbo].[Visiteur] ([idVisiteur], [Objectif], [Prime], [avantage], [idBudget]) VALUES (3, N'malade', N'200€', N'RTT', 1)
INSERT [dbo].[Visiteur] ([idVisiteur], [Objectif], [Prime], [avantage], [idBudget]) VALUES (5, N'virus', N'400€', N'RTT', 1)
INSERT [dbo].[Visiteur] ([idVisiteur], [Objectif], [Prime], [avantage], [idBudget]) VALUES (20, N'test1', N'500€', N'RTT', 1)
INSERT [dbo].[Visiteur] ([idVisiteur], [Objectif], [Prime], [avantage], [idBudget]) VALUES (21, N'test2', N'700€', N'cheque vacance', 1)
INSERT [dbo].[Visiteur] ([idVisiteur], [Objectif], [Prime], [avantage], [idBudget]) VALUES (23, N'test3', N'700', N'quec', 1)
GO
ALTER TABLE [dbo].[failed_jobs] ADD  DEFAULT (getdate()) FOR [failed_at]
GO
ALTER TABLE [dbo].[Activite]  WITH CHECK ADD  CONSTRAINT [FK__Activite__idVisi__4BAC3F29] FOREIGN KEY([idVisiteur])
REFERENCES [dbo].[Visiteur] ([idVisiteur])
GO
ALTER TABLE [dbo].[Activite] CHECK CONSTRAINT [FK__Activite__idVisi__4BAC3F29]
GO
ALTER TABLE [dbo].[Asso_13]  WITH CHECK ADD FOREIGN KEY([idActivite])
REFERENCES [dbo].[Activite] ([idActivite])
GO
ALTER TABLE [dbo].[Asso_13]  WITH CHECK ADD FOREIGN KEY([idPraticien])
REFERENCES [dbo].[Praticien] ([idPraticien])
GO
ALTER TABLE [dbo].[Echantillon]  WITH CHECK ADD FOREIGN KEY([idProduit])
REFERENCES [dbo].[Produit] ([idProduit])
GO
ALTER TABLE [dbo].[Echantillon]  WITH CHECK ADD  CONSTRAINT [FK__Echantill__idVis__534D60F1] FOREIGN KEY([idVisite])
REFERENCES [dbo].[Visite] ([idVisite])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[Echantillon] CHECK CONSTRAINT [FK__Echantill__idVis__534D60F1]
GO
ALTER TABLE [dbo].[Praticien]  WITH CHECK ADD FOREIGN KEY([idSpecialite])
REFERENCES [dbo].[Specialite] ([idSpecialite])
GO
ALTER TABLE [dbo].[Produit]  WITH CHECK ADD FOREIGN KEY([idComposition])
REFERENCES [dbo].[Composition] ([idComposition])
GO
ALTER TABLE [dbo].[Responsable]  WITH CHECK ADD  CONSTRAINT [FK_Responsable_Personnel] FOREIGN KEY([idResponsable])
REFERENCES [dbo].[Personnel] ([idPersonnel])
GO
ALTER TABLE [dbo].[Responsable] CHECK CONSTRAINT [FK_Responsable_Personnel]
GO
ALTER TABLE [dbo].[Visiteur]  WITH CHECK ADD  CONSTRAINT [FK__Visiteur__idBudg__4222D4EF] FOREIGN KEY([idBudget])
REFERENCES [dbo].[Budget] ([idBudget])
GO
ALTER TABLE [dbo].[Visiteur] CHECK CONSTRAINT [FK__Visiteur__idBudg__4222D4EF]
GO
ALTER TABLE [dbo].[Visiteur]  WITH CHECK ADD  CONSTRAINT [FK_Visiteur_Personnel] FOREIGN KEY([idVisiteur])
REFERENCES [dbo].[Personnel] ([idPersonnel])
GO
ALTER TABLE [dbo].[Visiteur] CHECK CONSTRAINT [FK_Visiteur_Personnel]
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPane1', @value=N'[0E232FF0-B466-11cf-A24F-00AA00A3EFFF, 1.00]
Begin DesignProperties = 
   Begin PaneConfigurations = 
      Begin PaneConfiguration = 0
         NumPanes = 4
         Configuration = "(H (1[40] 4[20] 2[20] 3) )"
      End
      Begin PaneConfiguration = 1
         NumPanes = 3
         Configuration = "(H (1 [50] 4 [25] 3))"
      End
      Begin PaneConfiguration = 2
         NumPanes = 3
         Configuration = "(H (1 [50] 2 [25] 3))"
      End
      Begin PaneConfiguration = 3
         NumPanes = 3
         Configuration = "(H (4 [30] 2 [40] 3))"
      End
      Begin PaneConfiguration = 4
         NumPanes = 2
         Configuration = "(H (1 [56] 3))"
      End
      Begin PaneConfiguration = 5
         NumPanes = 2
         Configuration = "(H (2 [66] 3))"
      End
      Begin PaneConfiguration = 6
         NumPanes = 2
         Configuration = "(H (4 [50] 3))"
      End
      Begin PaneConfiguration = 7
         NumPanes = 1
         Configuration = "(V (3))"
      End
      Begin PaneConfiguration = 8
         NumPanes = 3
         Configuration = "(H (1[56] 4[18] 2) )"
      End
      Begin PaneConfiguration = 9
         NumPanes = 2
         Configuration = "(H (1 [75] 4))"
      End
      Begin PaneConfiguration = 10
         NumPanes = 2
         Configuration = "(H (1[66] 2) )"
      End
      Begin PaneConfiguration = 11
         NumPanes = 2
         Configuration = "(H (4 [60] 2))"
      End
      Begin PaneConfiguration = 12
         NumPanes = 1
         Configuration = "(H (1) )"
      End
      Begin PaneConfiguration = 13
         NumPanes = 1
         Configuration = "(V (4))"
      End
      Begin PaneConfiguration = 14
         NumPanes = 1
         Configuration = "(V (2))"
      End
      ActivePaneConfig = 0
   End
   Begin DiagramPane = 
      Begin Origin = 
         Top = 0
         Left = 0
      End
      Begin Tables = 
         Begin Table = "Personnel"
            Begin Extent = 
               Top = 7
               Left = 48
               Bottom = 170
               Right = 292
            End
            DisplayFlags = 280
            TopColumn = 2
         End
         Begin Table = "Responsable"
            Begin Extent = 
               Top = 7
               Left = 340
               Bottom = 148
               Right = 584
            End
            DisplayFlags = 280
            TopColumn = 0
         End
      End
   End
   Begin SQLPane = 
   End
   Begin DataPane = 
      Begin ParameterDefaults = ""
      End
      Begin ColumnWidths = 9
         Width = 284
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
      End
   End
   Begin CriteriaPane = 
      Begin ColumnWidths = 11
         Column = 1440
         Alias = 900
         Table = 1176
         Output = 720
         Append = 1400
         NewValue = 1170
         SortType = 1356
         SortOrder = 1416
         GroupBy = 1350
         Filter = 1356
         Or = 1350
         Or = 1350
         Or = 1350
      End
   End
End
' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'Vue_Personnel_Responsable'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPaneCount', @value=1 , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'Vue_Personnel_Responsable'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPane1', @value=N'[0E232FF0-B466-11cf-A24F-00AA00A3EFFF, 1.00]
Begin DesignProperties = 
   Begin PaneConfigurations = 
      Begin PaneConfiguration = 0
         NumPanes = 4
         Configuration = "(H (1[40] 4[20] 2[20] 3) )"
      End
      Begin PaneConfiguration = 1
         NumPanes = 3
         Configuration = "(H (1 [50] 4 [25] 3))"
      End
      Begin PaneConfiguration = 2
         NumPanes = 3
         Configuration = "(H (1 [50] 2 [25] 3))"
      End
      Begin PaneConfiguration = 3
         NumPanes = 3
         Configuration = "(H (4 [30] 2 [40] 3))"
      End
      Begin PaneConfiguration = 4
         NumPanes = 2
         Configuration = "(H (1 [56] 3))"
      End
      Begin PaneConfiguration = 5
         NumPanes = 2
         Configuration = "(H (2 [66] 3))"
      End
      Begin PaneConfiguration = 6
         NumPanes = 2
         Configuration = "(H (4 [50] 3))"
      End
      Begin PaneConfiguration = 7
         NumPanes = 1
         Configuration = "(V (3))"
      End
      Begin PaneConfiguration = 8
         NumPanes = 3
         Configuration = "(H (1[56] 4[18] 2) )"
      End
      Begin PaneConfiguration = 9
         NumPanes = 2
         Configuration = "(H (1 [75] 4))"
      End
      Begin PaneConfiguration = 10
         NumPanes = 2
         Configuration = "(H (1[66] 2) )"
      End
      Begin PaneConfiguration = 11
         NumPanes = 2
         Configuration = "(H (4 [60] 2))"
      End
      Begin PaneConfiguration = 12
         NumPanes = 1
         Configuration = "(H (1) )"
      End
      Begin PaneConfiguration = 13
         NumPanes = 1
         Configuration = "(V (4))"
      End
      Begin PaneConfiguration = 14
         NumPanes = 1
         Configuration = "(V (2))"
      End
      ActivePaneConfig = 0
   End
   Begin DiagramPane = 
      Begin Origin = 
         Top = 0
         Left = 0
      End
      Begin Tables = 
         Begin Table = "Personnel"
            Begin Extent = 
               Top = 7
               Left = 48
               Bottom = 170
               Right = 292
            End
            DisplayFlags = 280
            TopColumn = 0
         End
         Begin Table = "Visiteur"
            Begin Extent = 
               Top = 7
               Left = 340
               Bottom = 170
               Right = 584
            End
            DisplayFlags = 280
            TopColumn = 0
         End
      End
   End
   Begin SQLPane = 
   End
   Begin DataPane = 
      Begin ParameterDefaults = ""
      End
      Begin ColumnWidths = 9
         Width = 284
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 2820
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
      End
   End
   Begin CriteriaPane = 
      Begin ColumnWidths = 11
         Column = 1440
         Alias = 900
         Table = 1170
         Output = 720
         Append = 1400
         NewValue = 1170
         SortType = 1350
         SortOrder = 1410
         GroupBy = 1350
         Filter = 1350
         Or = 1350
         Or = 1350
         Or = 1350
      End
   End
End
' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'Vue_Personnel_Visiteur'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPaneCount', @value=1 , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'Vue_Personnel_Visiteur'
GO
